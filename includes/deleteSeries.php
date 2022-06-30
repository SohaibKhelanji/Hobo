<?php
session_start();
if (!isset($_SESSION['gebruikerid']) && (!$_SESSION['gebruikeradmin']=="1" )) {
    header('location: ../index.php');
}else {
    $id = $_GET["id"];
    $dbh = new PDO("mysql:host=localhost;dbname=hobo", 'root', '');
    $sql = "DELETE FROM `series` WHERE series_id='$id';";
    $result = $dbh->query($sql);
    $resultCheck = $result->execute();

    if (!$resultCheck) {
        header('location: ../contentmanager.php?error=verwijderengefaald');
    }
    else {
        header('location: ../contentmanager.php?error=serieverwijderd');
    }

}

