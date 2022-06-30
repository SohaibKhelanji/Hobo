<?php

class SignupContr extends Signup{

    private $voornaam;
    private $achternaam;
    private $email;
    private $wachtwoord;

    public function __construct($voornaam, $achternaam, $email, $wachtwoord) {
        $this->voornaam = $voornaam;
        $this->achternaam = $achternaam;
        $this->email = $email;
        $this->wachtwoord = $wachtwoord;
    }

    public function signupUser() {
        if($this->emailBeschikbaarheidsCheck() == false) {
            header("location:../registreren.php?error=emailingebruik");
            exit();
        }

        $this->setUser($this->voornaam, $this->achternaam, $this->email, $this->wachtwoord);
    }

    private function emailBeschikbaarheidsCheck() {

        $result;

        if (!$this->checkUser($this->email)) {
            $result = false;
        }else {
            $result = true;
        }
        return $result;
    }

}