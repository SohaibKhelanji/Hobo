<?php



$dbh =  new PDO("mysql:host=localhost;dbname=hobo",'root','');
$sql = "SELECT * FROM series WHERE series_editorspick = '1' ";
$result = $dbh->query($sql);
$resultCheck = $result->fetchAll();
$resultCount = count($resultCheck);

if ($resultCount > 0 && isset($_SESSION['gebruikerid'])) {
    foreach ($resultCheck as $row ) {
        echo " <figure>
                <img onclick=\"location.href='watch.php?id=$row[series_id]';\" src=\"imgs/series-covers/$row[series_cover]\" alt=\"Series cover\">
                <figcaption>$row[series_naam]</figcaption>
              </figure>
            ";
    }
}else {
    foreach ($resultCheck as $row ) {
        echo " <figure>
                <img onclick=\"location.href='login.php';\" src=\"imgs/series-covers/$row[series_cover]\" alt=\"Series cover\">
                <figcaption>$row[series_naam]</figcaption>
              </figure>
            ";
    }
}