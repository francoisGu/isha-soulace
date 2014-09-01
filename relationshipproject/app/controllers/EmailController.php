<?php

class EmailController extends BaseController {

    protected $layout = "layouts.main";

    public function __construct(){
        $this->beforeFilter('csrf', array('on'=>'post'));
    }

    public function getEmail(){
        $this->layout->content = View::make('emails.email');
    }

    public function postSend(){
       
        Mailgun::send('emails.message', array('text'=>Input::get('text')), function($message){
            $message->to(Input::get('email'), 'Tester')->subject('send success');
        }); 

        return Redirect::back()->with('message', 'Thanks for using.')->onlyInput('email');
    }

}
?>
