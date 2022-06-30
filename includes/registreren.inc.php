<?php

if(isset($_POST["submit"])) {
    $voornaam = $_POST["voornaam"];
    $achternaam = $_POST["achternaam"];
    $email = $_POST["email"];
    $wachtwoord = $_POST["wachtwoord"];

    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    $registreren = new SignupContr($voornaam, $achternaam, $email, $wachtwoord);

    $registreren->signupUser();

    header("location:../registreren.php?error=none");
}