<?php

use App\Interfaces\UserAccountInterface;

class UsersController extends BaseController {


    protected $layout = "layouts.main";


    public function __construct(User $account) {
        $this->account = $account; 
        $this->beforeFilter('csrf', 
            array('on'=>'post'));
        //$this->beforeFilter('auth', array('only'=>array('getDashboard')));
    }

    public function getRegister() {
        $types = DB::table('services')->lists('type');

        $services = array();

        foreach($types as $type){

            $services[$type] = $type;


        }
        return View::make('users.register')->with('services', $services);
    }

    public function postRegister() {
        $rules = array(
            'first_name' =>'required|alpha|min:2',
            'last_name'  =>'required|alpha|min:2',
            'email'     =>'required|email|unique:users',
            'password'  =>'required|alpha_num|between:6,12|confirmed',
            'password_confirmation' =>'required|alpha_num|between:6,12'
        );

        $validator = Validator::make(Input::all(), $rules);


        if ($validator->passes()) {
            /*$registerInfo = array(*/
            //'email'     => Input::get('email', null),
            //'password'  => Input::get('password', null),
            //'firstname' => Input::get('firstname', null),
            //'lastname'  => Input::get('lastname', null),
            //);
            //
            $venue = Util::getVenue(Input::all());

            $geocode = Map::validateAddress($venue, Input::get('postcode'));

            if(is_null($geocode)){
                return Redirect::back()->withErrors('Location not found.')->withInput();
            }

            $registerInfo = array_merge(Input::all(), array('longitude' => $geocode['longitude'], 'latitude' => $geocode['latitude']));

            $this->account->register('ServiceProvider' , $registerInfo);


            return Redirect::to('users/login')->with('message', 'Thanks for 
                registering! Only when your account gets approved, you can log 
                into the website. We will manage it as soon as possible. Thank 
                you for your support.');

        } else {
            return Redirect::back()->with('message', 'The following errors 
                occurred')->withErrors($validator)->withInput();
        }
    }

    public function getActivation() {
        return View::make('users.activation');
    }

    public function activate( $activationCode ) {

        $activateMessage = $this->account->activate( $activationCode );

        return Redirect::to($activateMessage['url'])->with('message', 
            $activateMessage['message']);

    }

    public function getLogin() {

        if(Sentry::check()){
            $user = Sentry::getUser();
            $group = Sentry::findGroupByName('Service Providers');
            if($user->inGroup($group)){
                return Redirect::to('serviceProviders/' .$user->id);
            } else{
            
                return Redirect::to('/admin/');
            }
        }
        return View::make('users.login');
    }

    public function postLogin() {

        $rules = array(
            'email'     => 'required|email',
            'password'  => 'required|between:6,12'
        );


        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails()){
            return Redirect::to('users/login')
                -> withErrors($validator)
                -> withInput(Input::except('password'));
        } else
        {

            $loginInfo = array(
                'email'         => Input::get('email'),
                'password'      => Input::get('password'),
                'rememberme'    => Input::get('rememberme') );

            $loginMessage = $this->account->login($loginInfo);
            
            if(Sentry::check()){
                //dd($loginMessage['url']);
                return Redirect::to($loginMessage['url'] . Sentry::getUser()->userable_id)->with('message', 
                    $loginMessage['message']);
            } else {
                return Redirect::to($loginMessage['url'])->withMessage($loginMessage['message']);
            }
         }

    }


    public function getLogout() {
        Sentry::logout();
        return Redirect::to('users/login')->with('message', 'You are now logged 
            out!');
    }

}
