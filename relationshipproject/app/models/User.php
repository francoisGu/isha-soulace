<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

        use UserTrait, RemindableTrait;

        public static $rules = array(
            'firstname' =>'required|alpha|min:2',
            'lastname'  =>'required|alpha|min:2',
            'email'     =>'required|email|unique:users',
            'password'  =>'required|alpha_num|between:6,12|confirmed',
            'password_confirmation' =>'required|alpha_num|between:6,12'
        );

        /**
         * The database table used by the model.
         *
         * @var string
         */
        protected $table = 'users';

        /**
         * The attributes excluded from the model's JSON form.
         *
         * @var array
         */
        protected $hidden = array('password', 'remember_token');

        /**
         * Get the unique identifier for the user.
         *
         * @return mixed
         */
        public function getAuthIdentifier()
        {
            return $this->getKey();
        }

        /**
         * Get the password for the user.
         *
         * @return string
         */
        public function getAuthPassword()
        {
            return $this->password;
        }

        /**
         * Get the e-mail address where password reminders are sent.
         *
         * @return string
         */
        public function getReminderEmail()
        {
            return $this->email;
        }

        public function getRememberToken()
        {
            return $this->remember_token;
        }

        public function setRememberToken($value)
        {
            $this->remember_token = $value;
        }

        public function getRememberTokenName()
        {
            return 'remember_token';
        }

        public function register(array $registerInfo){

            try {
                $register = array('email'    => $registerInfo['email'], 
                    'password' => $registerInfo['password']);
                $user = Sentry::register($register, false); 

                $activationCode = URL::to('/') . '/activate/' .  
                    $user->getActivationCode();

                $data = array('firstname'      => $registerInfo['firstname'],
                    'activationCode' => $activationCode
                );
                $userInfo = array('firstname' => $registerInfo['firstname'],
                    'lastname'  => $registerInfo['lastname'],
                    'email'     => $registerInfo['email'],
                );

                Mailgun::send('emails.welcome', $data, function($message) use 
                    ($userInfo) {
                        $message -> to($userInfo['email'], 
                            $userInfo['firstname'] . ' ', $userInfo['lastname']) 
                            -> subject('Welcome to the Isha SoulAce');
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
        }

        public function login(array $loginInfo){

            $message = "";

            try
            {
                // Login credentials
                $credentials = array( 'email' => $loginInfo['email'],
                    'password' => $loginInfo['password']
                );

                $rememberme = $loginInfo['rememberme'];
                // Authenticate the user
                //$user = Sentry::authenticate($credentials, false);
                $user = Sentry::authenticate($credentials, $rememberme?:false);

                $message = 'You are now logged in!';
                return ['url' => 'users/dashboard', 'message' => $message];


            }
            catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
            {

                $message = 'Wrong password, try again.';
                return ['url' => 'users/login', 'message' => $message];

            }
            catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
            {
                $message = 'User was not found.';
                return ['url' => 'users/login', 'message' => $message];

            }
            catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
            {
                $message = 'User is not activated.';
                return ['url' => 'users/login', 'message' => $message];

            }

            // The following is only required if the throttling is enabled
            catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
            {
                $message = 'User is suspended.';
                return ['url' => 'users/login', 'message' => $message];

            }
            catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
            {
                $message = 'User is banned.';
                return ['url' => 'users/login', 'message' => $message];

            }
        }

        public function activate($activationCode){

            try
            {
                $user = Sentry::findUserByActivationCode($activationCode);

                if($user -> attemptActivation($activationCode))
                {
                    //TO-Do
                    // Assign user to a group with some permissions 
                    return ['url' => 'users/login', 'message' => 'Thanks for 
                        activating!'];
                }
                else
                {
                    return ['url' => 'users/login', 'message' => 'Thanks for 
                        activating!'];

                } }
                    catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
                    {
                        return ['url' => 'users/login', 'message' => 'Thanks for 
                            activating!'];


                    } catch (Cartalyst\Sentry\Users\UserAlreadyActivatedException $e)
                    {
                        return ['url' => 'users/login', 'message' => 'Thanks for 
                            activating!'];


                    }
        }

        //public function all(){
        //return User::all();
        //}

        //public function find($id){
        //return User::find($id);
        //}

        //public function create($input){
        //return User::create($input);
        /*}*/
    }
