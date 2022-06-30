<?php
if (!isset($_SESSION['gebruikerid']) && (!$_SESSION['gebruikeradmin']=="1" )) {
    header('location: index.php');
}

if (!is_null($_SESSION["gebruikerlaatstbekeken"])) {

    $serieId = $_SESSION["gebruikerlaatstbekeken"];

} else {
    $serieId = 0;
}


if (!$serieId == 0) {

    $dbh = new PDO("mysql:host=localhost;dbname=hobo", 'root', '');
    $sql = "SELECT * FROM series WHERE series_id=$serieId";
    $result = $dbh->query($sql);
    $resultCheck = $result->fetchAll();
    $resultCount = count($resultCheck);

    if ($resultCount > 0) {

        foreach ($resultCheck as $row) {


            echo " 
                   
                <img onclick=\"location.href='watch.php?id=$row[series_id]';\" src=\"imgs/series-covers/$row[series_cover]\" alt=\"Series cover\">
                <div id='serie-info' style='width: 700px'>
                <h1> $row[series_naam]</h1> 
                <p>$row[series_beschrijving]</p>
                <br>
                <button id='verderkijken-button' style='cursor: pointer' onclick=\"location.href='watch.php?id=$row[series_id]';\"><span>Verder Kijken</span></button>
                </div>
                
              
            ";
        }
    }
}else {
    echo "<p style='margin-left: auto;margin-right: auto; margin-top: 100px'>Je hebt nog geen serie gekeken</p>";
}


