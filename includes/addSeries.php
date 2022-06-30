<?php
session_start();
if (!isset($_SESSION['gebruikerid']) && (!$_SESSION['gebruikeradmin']=="1" )) {
    header('location: ../index.php');
}
$conn = new PDO("mysql:host=localhost;dbname=hobo",'root','');

if (isset($_POST['submit'])) {
    $serienaam = $_POST['serienaam'];
    $seriejaar = $_POST['seriejaar'];
    $seriegenre= $_POST['seriegenre'];



     $serieimdb = $_POST['serieimdb'];
    $seriebeschrijving = $_POST['seriebeschrijving'];
    $serieeditorspick = $_POST['serieeditorspick'];


    $seriecoverfile = $_FILES['seriecover'];

    $seriecovername = $seriecoverfile['name'];
    $seriecovertmpname = $seriecoverfile['tmp_name'];
    $seriecovererror = $seriecoverfile['error'];

    $seriecoverext = explode('.', $seriecovername);
    $seriecoveractualext = strtolower(end($seriecoverext));
    $seriecoverallowed = array('jpg', 'jpeg', 'png');


    $videofile = $_FILES['seriebron'];

    $videofilename = $videofile['name'];
    $videofiletmpname = $videofile['tmp_name'];
    $videofileerror = $videofile['error'];


    $videofileext = explode('.', $videofilename);
    $videofileactualext = strtolower(end($videofileext));
    $videofileallowed = array('mp4', 'mov', 'avi');

    if (in_array($seriecoveractualext, $seriecoverallowed)) {
        if ($seriecovererror === 0) {
            $seriecoverdbname = $serienaam . "." . $seriecoveractualext;
            $seriecoverdestination = '../imgs/series-covers/' . $seriecoverdbname;
            move_uploaded_file($seriecovertmpname, $seriecoverdestination);
        } else {
            header("location: ../contentmanager.php?error=coverbestanderror");
        }
    } else {
        header("location: ../contentmanager.php?error=coverbestandverkeerd");
    }


    if (in_array($videofileactualext, $videofileallowed)) {
        if ($videofileerror === 0) {
            $videofiledbname = $serienaam . "." . $videofileactualext;
            $videofiledestination = '../vids/' . $videofiledbname;
            move_uploaded_file($videofiletmpname, $videofiledestination);
        } else {
            header("location: ../contentmanager.php?error=videobestanderror");
        }
    } else {
        header("location: ../contentmanager.php?error=videobestandverkeerd");


    }



    function serieToevoegen($conn, $serienaam, $seriejaar, $seriegenre, $serieimdb, $seriebeschrijving, $seriecoverdbname, $videofiledbname, $serieeditorspick) {
        $stmt = "INSERT INTO series (series_naam, series_jaar, series_genre, series_imdb, series_beschrijving, series_cover, series_bron, series_editorspick) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
        $result = $conn->prepare($stmt);
        if (!$conn->prepare($stmt)) {
            header("location:../contentmanager.php?error=stmtgefaald");
            exit();
        }

        $result->execute(array($serienaam, $seriejaar, $seriegenre, $serieimdb, $seriebeschrijving, $seriecoverdbname, $videofiledbname, $serieeditorspick));
        $result = null;


    }



        serieToevoegen($conn, $serienaam, $seriejaar, $seriegenre, $serieimdb, $seriebeschrijving, $seriecoverdbname, $videofiledbname, $serieeditorspick);

    header("location: ../contentmanager.php?error=serienone");
    exit();
}

