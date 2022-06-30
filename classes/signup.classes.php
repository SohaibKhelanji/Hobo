<?php

class Signup extends Dbh{


   protected  function setUser($voornaam, $achternaam, $email, $wachtwoord) {

        $stmt = $this->connect()->prepare('INSERT INTO users (users_voornaam, users_achternaam, users_email, users_wachtwoord) VALUES (?, ?,?, ?);');

        $hashedWachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($voornaam, $achternaam, $email, $hashedWachtwoord))) {
            $stmt = null;
            header("location: ../registreren.php?error=stmt1failed");
            exit();
        }

        $stmt = null;
    }


    protected  function checkUser($email) {

        $stmt = $this->connect()->prepare('SELECT users_email FROM users WHERE users_email= ?;');

        if(!$stmt->execute(array($email))) {
            $stmt = null;
            header("location: ../registreren.php?error=stmt2failed");
            exit();
        }

        $resultCheck;

        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        }
        else {
            $resultCheck = true;
        }

        return $resultCheck;
    }

}