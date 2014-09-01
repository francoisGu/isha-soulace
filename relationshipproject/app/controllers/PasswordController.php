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

        try
        {
            $email = Input::get('email');
            // Find the user using the user email address
            $user = Sentry::findUserByLogin($email);
        
            // Get the password reset code
            $resetCode = $user->getResetPasswordCode();
            //echo $resetCode;
            $data = array('text' => $resetCode);
        
            Mailgun::send('emails.message', $data, function($message){
                $message->to(Input::get('email'), 'Receiver')->subject('Reset password');
            }); 

            return Redirect::to('password/reset')->with('message', 'Thanks for 
                using.');
 
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            return Redirect::back()->with('message', 'User was not found.')->onlyInput('email');
        }
    }

    public function getReset(){
        $this->layout->content = View::make('password.reset');
    
    }

    public function postReset() {
        try
        {
            $resetPasswordCode = Input::get('resetcode');
            $newPassword = Input::get('password');
            // Find the user using the user id
            $user = Sentry::findUserByResetPasswordCode($resetPasswordCode);
        
            // Check if the reset password code is valid
            if ($user->checkResetPasswordCode($resetPasswordCode))
            {
                // Attempt to reset the user password
                if ($user->attemptResetPassword($resetPasswordCode, $newPassword))
                {
                    // Password reset passed
                    return Redirect::to('users/login')->with('message', 'Password reset!');
                }
                else
                {
                    return Redirect::to('password/remind')->with('message', 'password reset failed');
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
            return Redirect::back()->with('message', 'User was not found.')->onlyInput('email');
        }   
    }

}
?>
