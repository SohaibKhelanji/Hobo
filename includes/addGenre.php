<?php

session_start();
if (!isset($_SESSION['gebruikerid']) && (!$_SESSION['gebruikeradmin']=="1" )) {
    header('location: ../index.php');
}

$genretmp = $_POST['genrenaam'];
$genre = ucfirst($genretmp);

$dbh =  new PDO("mysql:host=localhost;dbname=hobo",'root','');
$sql = "SELECT * FROM genres WHERE genres_naam = '$genre'";
$result = $dbh->query($sql);
$resultCheck = $result->fetchAll();
$resultCount = count($resultCheck);


if (!$resultCount > 0) {

    function genreToevoegen($dbh, $genre) {
        $stmt = "INSERT INTO genres (genres_naam) VALUES (?);";
        $result = $dbh->prepare($stmt);
        if (!$dbh->prepare($stmt)) {
            header("location:../contentmanager.php?error=stmtgefaald");
            exit();
        }

        $result->execute(array($genre));
        $result = null;


    }



    genreToevoegen($dbh, $genre);

    header('location: ../contentmanager.php?error=genrenone');


}else {
    header('location: ../contentmanager.php?error=genrebestaatal');
}
