<?php

use App\Interfaces\UserAccountInterface;

class UsersController_bk extends BaseController {

    protected $layout = "layouts.main";
    protected $account;

    public function __construct(User $account) {
        $this->account = $account; 
        $this->beforeFilter('csrf', 
            array('on'=>'post'));
        //$this->beforeFilter('auth', array('only'=>array('getDashboard')));
    }

    public function getRegister() {
        $this->layout->content = View::make('users.register');
    }

    public function postRegister() {
        $rules = array(
            'firstname' =>'required|alpha|min:2',
            'lastname'  =>'required|alpha|min:2',
            'email'     =>'required|email|unique:users',
            'password'  =>'required|alpha_num|between:6,12|confirmed',
            'password_confirmation' =>'required|alpha_num|between:6,12'
        );

        $validator = Validator::make(Input::all(), $rules);
            //try {
                /*$user = Sentry::register(array(*/
                    //'email'    => Input::has('email') ? Input::get('email') : null,
                    //'password' => Input::has('password') ? Input::get('password') : null,
                    //'first_name' => Input::has('firstname')? Input::get('firstname') : null,
                    //'last_name' => Input::has('lastname')? Input::get('lastname') : null,
                    //'type' => '1',             
                    /*), false); */
              /*  $serviceProvider = ServiceProvider::create(array(*/
                    //'identity' => Input::get('identity'),
                    //'abn' => Input::has('ABN') ? Input::get('ABN') : null,
                    //'acn' => Input::has('ACN') ? Input::get('ACN') : null,
                    //'address' => Input::has('address') ? Input::get('address') : null,
                    //'phone' => Input::has('phone') ? Input::get('phone') : null,
                    //'mobile' => Input::has('mobile') ? Input::get('mobile') : null,
                    //'mode' => Input::has('mode') ? Input::get('mode') : null,
                    //'companyname' => Input::has('companyname') ? Input::get('companyname') : null,
                    //'user_id' => $user->id,
                    //));
                
                //$activationCode = URL::to('/') . '/activate/' . $user->getActivationCode();
                //Mailgun::send('emails.welcome', 
                    //array('firstname' => Input::get('firstname'),  
                        //'activationCode'  => $activationCode), 
                    //function($message){
                        //$message -> to(Input::get('email'), 
                            //Input::get('firstname') . ' ', Input::get('lastname')) -> 
                        //subject('Welcome to the Isha SoulAce');
                    /*});*/
                
/*            } */
            //catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
                //echo 'Login field is required.'; 
            //}
            //catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
                //echo 'Password field is required.'; 
            //}
            //catch (Cartalyst\Sentry\Users\UserExistsException $e) {
                //echo 'User with this login already exists.'; 
            //}


        if ($validator->passes()) {
            $registerInfo = array(
                'email'     => Input::get('email', null),
                'password'  => Input::get('password', null),
                'firstname' => Input::get('firstname', null),
                'lastname'  => Input::get('lastname', null),
            );

            $this->account->register($registerInfo);

            return Redirect::to('users/login')->with('message', 'Thanks for 
                registering!');
        } else {
            return Redirect::back()->with('message', 'The following errors 
                occurred')->withErrors($validator)->withInput();
        }
    }

    public function getActivation() {
        $this->layout->content = View::make('users.activation');
    }

    public function activate( $activationCode ) {

        $activateMessage = $this->account->activate( $activationCode );

        return Redirect::to($activateMessage['url'])->with('message', 
            $activateMessage['message']);

    }

    public function getLogin() {
        $this->layout->content = View::make('users.login');

        if(Sentry::check()){
            return Redirect::to('serviceProvider/profile');
        }
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

            return Redirect::to($loginMessage['url'])->with('message', 
                $loginMessage['message']);
        }

    }

    public function getDashboard() {
        $this->layout->content = View::make('users.dashboard');
    }

    public function getLogout() {
        Sentry::logout();
        return Redirect::to('users/login')->with('message', 'Your are now 
            logged out!');
    }

}
