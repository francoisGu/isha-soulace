<?php

class Email extends Eloquent {
    
    public $text;
    public $emal;  

    /*
     * send email
     */
    public static function sendEmail($template, $data, $userInfo ){

        Mailgun::send($template, $data, function($message) use 
            ($userInfo) {
                $message -> to($userInfo['email'], 
                    $userInfo['firstname'] . ' ', $userInfo['lastname']) 
                    -> subject('Welcome to the Isha SoulAce');
            });
    }
}
?>

