<?php

use App\Interfaces\UserAccountInterface;

class UsersController extends BaseController {

    protected $layout = "layouts.main";
    static $lay = "layouts.main";
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

        if ($validator->passes()) {

            $registerInfo = array(
                'email'     => Input::get('email'),
                'password'  => Input::get('password'),
                'firstname' => Input::get('firstname'),
                'lastname'  => Input::get('lastname'),
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
            return Redirect::to('users/dashboard');
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
