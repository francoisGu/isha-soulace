<?php

class UsersController extends BaseController {

    protected $layout = "layouts.main";

    public function __construct() {
        $this->beforeFilter('csrf', array('on'=>'post'));
        //$this->beforeFilter('auth', array('only'=>array('getDashboard')));
    }

    public function getRegister() {
        $this->layout->content = View::make('users.register');
    }

    public function postRegister() {
        $validator = Validator::make(Input::all(), User::$rules);

        if ($validator->passes()) {

            try {
                $user = Sentry::register(array(
                            'email'    => Input::has('email') ? Input::get('email') : null,
                            'password' => Input::has('password') ? Input::get('password') : null,                
                        ), false); 

                $activationCode = URL::to('/') . '/activate/' . $user->getActivationCode();
                Mailgun::send('emails.welcome', 
                    array('firstname' => Input::get('firstname'),  
                    'activationCode'  => $activationCode), 
                    function($message){
                        $message -> to(Input::get('email'), 
                            Input::get('firstname') . ' ', Input::get('lastname')) -> 
                            subject('Welcome to the Isha SoulAce');
                    });
                
            } 
            catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
                echo 'Login field is required.'; 
            }
            catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
                echo 'Password field is required.'; 
            }
            catch (Cartalyst\Sentry\Users\UserExistsException $e) {
                echo 'User with this login already exists.'; 
            }

            return Redirect::to('users/login')->with('message', 'Thanks 
                for registering!');
        } else {
            return Redirect::to('users/register')->with('message', 'The 
                following errors 
                occurred')->withErrors($validator)->withInput();
        }
    }

    public function getActivation() {
        $this->layout->content = View::make('users.activation');
    }

    public function activate( $activationCode ) {

		//public static $rules = array(
			//'firstname'=>'required|alpha|min:2',
			//'lastname'=>'required|alpha|min:2',
			//'email'=>'required|email|unique:users',
			//'password'=>'required|alpha_num|between:6,12|confirmed',
			//'password_confirmation'=>'required|alpha_num|between:6,12'
		/*);*/
        try
        {
    /*        $user = Sentry::findUserByCredentials(array(*/
                    //'email' => Input::get('email'),
                    /*));*/
            //$activationCode = Input::get('activationCode');
            $user = Sentry::findUserByActivationCode($activationCode);

            if($user -> attemptActivation($activationCode))
            {
                //TO-Do
                // Assign user to a group with some permissions 
                return Redirect::to('users/login')->with('message', 'Thanks 
                    for activating!');
       
            }
            else
            {
                return Redirect::to('users/register')->with('message'. 'Your 
                    activation code is incorrect')->withInput(); 
            } 
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            return Redirect::to('users/register')->with('message'. 'User was not 
                found.'); 
        } 
        catch (Cartalyst\Sentry\Users\UserAlreadyActivatedException $e)
        {
            return Redirect::to('users/login')->with('message', 'User is already 
                activated.');
        }
    }

    public function getLogin() {
        $this->layout->content = View::make('users.login');

        if(Sentry::check()){
            return Redirect::to('users/dashboard');
        }
    }

    public function postLogin() {

        try
        {
            // Login credentials
            $credentials = array(
                'email'    => Input::get('email'),
                'password' => Input::get('password'),
            );
        
            // Authenticate the user
            //$user = Sentry::authenticate($credentials, false);
            $user = Sentry::authenticate($credentials, Input::get('rememberme')?:false);
            
            return Redirect::to('users/dashboard')->with('message', 'You 
                are now logged in!');

        }
        catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            echo 'Email field is required.';
        }
        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            echo 'Password field is required.';
        }
        catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
        {

            echo 'Wrong password, try again.';

            return Redirect::to('users/login')
                ->with('message', 'Your username/password combination was 
                incorrect')
                ->withInput();
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            echo 'User was not found.';
        }
        catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
        {
            echo 'User is not activated.';
        }
        
        // The following is only required if the throttling is enabled
        catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
        {
            echo 'User is suspended.';
        }
        catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
        {
            echo 'User is banned.';
        }
    
    }

    public function getDashboard() {
        $this->layout->content = View::make('users.dashboard');
    }

    public function getLogout() {
        //Auth::logout();
        Sentry::logout();
        return Redirect::to('users/login')->with('message', 'Your are now 
            logged out!');
    }
}
