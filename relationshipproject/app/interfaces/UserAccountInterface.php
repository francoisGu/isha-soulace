<?php namespace App\Interfaces;

# app/interfaces/UserAccountInterface.php

interface UserAccountInterface {
    
    public function register(array $registerInfo);
    public function login(array $loginInfo);
    public function activate($activationCode);
}
?>
