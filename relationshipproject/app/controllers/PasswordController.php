<?php

//use App\Interfaces\PasswordInterface;

class PasswordController extends BaseController {

    protected $layout = "layouts.main";
    protected $reminder;

    public function __construct(PasswordReminder $reminder){
        $this->reminder = $reminder;
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
            $message = $this->reminder->remind(Input::get('email'));

            return Redirect::to($message['url'])->with('message', 
                $message['message']);
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
            $resetPasswordCode = Input::get('resetPasswordCode');
            $newPassword = Input::get('password');

            $resetMessage = array(
                'resetPasswordCode' => $resetPasswordCode,
                'password' => $newPassword
            );

            $message = $this->reminder->reset($resetMessage);

            return Redirect::to($message['url'])->with('message', $message['message']);
        }
    }

}
?>
