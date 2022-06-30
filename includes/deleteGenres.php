<?php
session_start();
if (!isset($_SESSION['gebruikerid']) && (!$_SESSION['gebruikeradmin'] == "1")) {
    header('location: ../index.php');
}

$id = $_GET['id'];

if (!$id == 0) {

    $dbh = new PDO("mysql:host=localhost;dbname=hobo", 'root', '');
    $sql = "DELETE FROM `genres` WHERE genres_id='$id';";
    $result = $dbh->query($sql);
    $resultCheck = $result->execute();

    if (!$resultCheck) {
        header('location: ../contentmanager.php?error=verwijderengefaald');
    }
    else {
        header('location: ../contentmanager.php?error=genreverwijderd');
    }

}else {
    header('location: ../contentmanager.php');
}
