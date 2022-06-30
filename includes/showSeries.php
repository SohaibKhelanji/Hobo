<?php
if (!isset($_SESSION['gebruikerid']) && (!$_SESSION['gebruikeradmin']=="1" )) {
    header('location: ../index.php');
}

$dbh =  new PDO("mysql:host=localhost;dbname=hobo",'root','');
$sql = "SELECT * FROM series  ORDER BY rand() LIMIT 12";
$result = $dbh->query($sql);
$resultCheck = $result->fetchAll();
$resultCount = count($resultCheck);

if ($resultCount > 0) {

    foreach ($resultCheck as $row ) {


       echo " <figure>
                <img onclick=\"location.href='watch.php?id=$row[series_id]';\" src=\"imgs/series-covers/$row[series_cover]\" alt=\"Series cover\">
                <figcaption>$row[series_naam]</figcaption>
              </figure>
            ";
    }
}
