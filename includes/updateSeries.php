<?php
session_start();
if (isset($_POST['submit']) && isset($_SESSION['gebruikerid']) && ($_SESSION['gebruikeradmin']=="1" )) {

    $dbh = new PDO("mysql:host=localhost;dbname=hobo", 'root', '');
    $serieId = $_GET['id'];
    $naam = $_POST['serienaam'];
    $jaar = $_POST['seriejaar'];
    $genre = $_POST['seriegenre'];
    $imdb = $_POST['serieimdb'];
    $beschrijving = $_POST['seriebeschrijving'];
    $editorspick = $_POST['serieeditorspick'];


    $query = "UPDATE `series` SET `series_naam`='$naam',`series_jaar`='$jaar',`series_genre`='$genre',`series_imdb`='$imdb',`series_beschrijving`='$beschrijving',`series_editorspick`='$editorspick'  WHERE series_id='$serieId';";
    $queryResult = $dbh->query($query);

    if ($queryResult) {
        header("location:../contentmanager.php?error=bewerkennone");
        exit();
    } else {
        header("location:../contentmanager.php?error=bewerkengefaald");

    }
}else {
    header('location: ../login.php');
}