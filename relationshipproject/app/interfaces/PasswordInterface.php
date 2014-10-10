<?php namespace App\Interfaces;
interface PasswordInterface{
    
    public function reset(array $resetMessage);
    public function remind($email);

}
?>
