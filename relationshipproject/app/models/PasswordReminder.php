<?php 

//use App\Interfaces\PasswordInterface;

class PasswordReminder extends Eloquent {

    public function reset(array $resetMessage){
        try
        {
            $resetPasswordCode = $resetMessage['resetPasswordCode'];
            $newPassword = $resetMessage['password'];
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

                    $message = array(
                        'url' => '/users/login/',
                        'message' => 'Password reset!'
                    );

                    return $message;
                }
                else
                {
                    $message = array(
                        'url' => '/password/remind/',
                        'message' => 'password reset failed.'
                    );

                    return $message;
                }
            }
            else
            {
                $message = array(
                    'url' => '/password/remind/',
                    'message' => 'password reset code Invalid'
                );
                return $message;
            }
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            $message = array(
                'url' => '/users/login/',
                'message' => 'User was not found.'
            );
            return $message;
        }    
    }

    public function remind($email){
        try
        {
            // Find the user using the user email address
            $user = Sentry::findUserByLogin($email);

            if(is_null($user)){
                  $message = array(
                'url' => '/password/remind',
                'message' => 'No email found.');

            }

            // Get the password reset code
            $resetPasswordCode = $user->getResetPasswordCode();
            //echo $resetPasswordCode;
            $data = array('email' => $email, 'resetPasswordCode' => 
                $resetPasswordCode);

            Mailgun::send('emails.auth.reminder', $data, function($message) use 
                ($user){
                    $message->to($user->email, 
                        $user->firstname)->subject('Reset password');
                }); 

            Session::flash('success_msg', 'We have sent a link to your email 
                account please follow that to reset your password');

            $message = array(
                'url' => '/users/login/',
                'message' => 'Reset password code sent to your email.'
            );
            return $message;

        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            $message = array(
                'url' => '/password/remind/',
                'message' => 'Reset password code sent to your email.'
            );
            return $message;
        }
    }

}
