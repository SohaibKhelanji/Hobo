<?php

class LoginContr extends Login{

    private $email;
    private $wachtwoord;

    public function __construct($email, $wachtwoord) {
        $this->email = $email;
        $this->wachtwoord = $wachtwoord;
    }

    public function loginUser() {

        $this->getUser($this->email, $this->wachtwoord);
    }



}