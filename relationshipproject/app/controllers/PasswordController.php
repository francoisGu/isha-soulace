<?php

class PasswordController extends BaseController {

    protected $layout = "layouts.main";

    public function __construct(){
        $this->beforeFilter('csrf', array('on'=>'post'));
    }

    public function getRemind(){
        $this->layout->content = View::make('password.remind');
    }

    public function postRemind(){

        $rules = array(
            'email' => 'required|email'
        );
        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        } else{
            try
            {
                $email = Input::get('email');
                // Find the user using the user email address
                $user = Sentry::findUserByLogin($email);

                // Get the password reset code
                $resetPasswordCode = $user->getResetPasswordCode();
                //echo $resetPasswordCode;
                $data = array('email' => $email, 'resetPasswordCode' => 
                    $resetPasswordCode);

                Mailgun::send('emails.auth.reminder', $data, 
                    function($message){
                    $message->to(Input::get('email'), 
                'Receiver')->subject('Reset password');
                }); Session::flash('success_msg', 'We have sent a link to your 
                    email account please follow that to reset your password');
                return Redirect::to('/');

            }
            catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
            {
                return Redirect::back()->with('message', 'User was not 
                    found.')->onlyInput('email');
            }
        }
    }

    public function getReset(){
        if (Input::has('email') && Input::has('resetPasswordCode')) {

            try {
                // Find the user using the user id
                $user = Sentry::findUserByLogin(Input::get('email'));

                // Check if the reset password code is valid
                if ($user -> 
                    checkResetPasswordCode(Input::get('resetPasswordCode'))) {
                    $this->layout->content = View::make('password.reset');
                } else {
                    Session::flash('error_msg', 'Invalid request . Please enter 
                        email to reset your password');
                    return Redirect::to('/password/remind');
                }
            } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
                Session::flash('error_msg', 'User not found');
                return Redirect::to('/password/remind');
            }
        } else {
            Session::flash('error_msg', 'Invalid request . Please enter email 
                to reset your password');
            return Redirect::to('/password/remind');

        }

    }

    public function postReset() {

        $rules = array(
            'password' => 'required|alpha_num|between:6,12|confirmed',
            'password_confirmation' => 'required|alpha_num|between:6,12'
        );

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        } else {
            try
            {
                $resetPasswordCode = Input::get('resetPasswordCode');
                $newPassword = Input::get('password');
                // Find the user using the user id
                $user = 
                    Sentry::findUserByResetPasswordCode($resetPasswordCode);

                // Check if the reset password code is valid
                if ($user->checkResetPasswordCode($resetPasswordCode))
                {
                    // Attempt to reset the user password
                    if ($user->attemptResetPassword($resetPasswordCode, 
                        $newPassword))
                    {
                        // Password reset passed
                        Session::flash('success_msg', 'Password changed 
                            successfully . Please login below'); 

                        return 
                            Redirect::to('users/login')->with('message', 
                            'Password reset!');
                    }
                    else
                    {
                        return Redirect::to('password/remind')->with('message', 
                            'password reset failed');
                    }
                }
                else
                {
                    // The provided password reset code is Invalid
                    return Redirect::to('password/remind')->with('message', 
                        'password reset code Invalid');
                }
            }
            catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
            {
                return Redirect::back()->with('message', 'User was not 
                    found.')->onlyInput('email');
            }   }
    }

}
?>
