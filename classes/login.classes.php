<?php

class Login extends Dbh {


    protected function getUser($email, $wachtwoord) {

        $stmt = $this->connect()->prepare('SELECT users_wachtwoord FROM users WHERE users_email= ?;');


        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header("location: ../login.php?error=stmt1failed");
            exit();
        }


        if ($stmt->rowCount() == 0) {

            $stmt = null;
            header("location: ../login.php?error=gebruikernietgevonden");
            exit();
        }

        $hashedWachtwoord = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkWachtwoord = password_verify($wachtwoord, $hashedWachtwoord[0]["users_wachtwoord"]);

        if ($checkWachtwoord == false) {

            $stmt = null;
            header("location: ../login.php?error=verkeerdeinloggegevens");
            exit();
        }elseif ($checkWachtwoord == true) {

            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_email= ?;');

            if (!$stmt->execute(array($email))) {
                $stmt = null;
                header("location: ../index.php?error=stmt1failed");
                exit();
            }

            if ($stmt->rowCount() == 0) {

                $stmt = null;
                header("location: ../login.php?error=gebruikernietgevonden");
                exit();
            }

            $gebruiker = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["gebruikerid"] = $gebruiker[0]["users_id"];
            $_SESSION["gebruikeremail"] = $gebruiker[0]["users_email"];
            $_SESSION["gebruikervoornaam"] = $gebruiker[0]["users_voornaam"];
            $_SESSION["gebruikerachternaam"] = $gebruiker[0]["users_achternaam"];
            $_SESSION["gebruikerlaatstbekeken"] = $gebruiker[0]["users_laatstbekeken"];
            $_SESSION["gebruikeradmin"] = $gebruiker[0]["users_admin"];
            $_SESSION["gebruikerblocked"] = $gebruiker[0]["users_blocked"];

            $stmt = null;
        }
    }
}


