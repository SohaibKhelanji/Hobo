<?php


if(isset($_POST["submit"])) {
    $email = $_POST["email"];
    $wachtwoord = $_POST["password"];

    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";
    $login = new LoginContr($email, $wachtwoord);

    $login->loginUser();

    if (!$_SESSION["gebruikeradmin"]=="1" ) {

        header("location:../index.php");

    }else{
        header("location:../admin.php");
    }

    if ($_SESSION["gebruikerblocked"]=="1") {
        session_start();
        session_unset();
        session_destroy();
        header("location: ../login.php?error=blocked");
    }

}