<?php

class UsersController extends BaseController {

    protected $layout = "layouts.menu";

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
                            'first_name' => Input::has('firstname')? Input::get('firstname') : null,
                            'last_name' => Input::has('lastname')? Input::get('lastname') : null,
                            'type' => '1',             
                        ), false); 
                $serviceProvider = ServiceProvider::create(array(
                    'identity' => Input::get('identity'),
                    'abn' => Input::has('ABN') ? Input::get('ABN') : null,
                    'acn' => Input::has('ACN') ? Input::get('ACN') : null,
                    'address' => Input::has('address') ? Input::get('address') : null,
                    'phone' => Input::has('phone') ? Input::get('phone') : null,
                    'mobile' => Input::has('mobile') ? Input::get('mobile') : null,
                    'mode' => Input::has('mode') ? Input::get('mode') : null,
                    'companyname' => Input::has('companyname') ? Input::get('companyname') : null,
                    'user_id' => $user->id,
                    ));
                
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
                for registering! Only when your account gets approved, you can log into the website. We will manage it as soon as possible. Thank you for your support.');
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
            return Redirect::to('serviceProvider/profile');
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
            
            return Redirect::to('serviceProvider/profile');

        }
        catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            echo 'Email field is required.';
                        return Redirect::to('users/login')
                ->with('message', 'Your username/password combination was 
                incorrect')
                ->withInput();
        }
        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            echo 'Password field is required.';
                        return Redirect::to('users/login')
                ->with('message', 'Your username/password combination was 
                incorrect')
                ->withInput();
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
                        return Redirect::to('users/login')
                ->with('message', 'Your username/password combination was 
                incorrect')
                ->withInput();
        }
        catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
        {
            echo 'User is not activated.';
                        return Redirect::to('users/login')
                ->with('message', 'Your account is not activated now')
                ->withInput();
        }
        
        // The following is only required if the throttling is enabled
        catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
        {
            echo 'User is suspended.';
                        return Redirect::to('users/login')
                ->with('message', 'Your username/password combination was 
                incorrect')
                ->withInput();
        }
        catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
        {
            echo 'User is banned.';
                        return Redirect::to('users/login')
                ->with('message', 'Your username/password combination was 
                incorrect')
                ->withInput();
        }
    
    }


    public function getLogout() {
        //Auth::logout();
        Sentry::logout();
        return Redirect::to('users/login')->with('message', 'You are now 
            logged out!');
    }
}
