<?php
if (!isset($_SESSION['gebruikerid']) && (!$_SESSION['gebruikeradmin'] == "1")) {
    header('location: login.php');
}


$dbh =  new PDO("mysql:host=localhost;dbname=hobo",'root','');
$sql = "SELECT * FROM genres  ORDER BY rand() ";
$result = $dbh->query($sql);
$resultCheck = $result->fetchAll();
$resultCount = count($resultCheck);

if ($resultCount > 0 && isset($_SESSION['gebruikerid'])) {

        foreach ($resultCheck as $row) {

            echo " 
               <h2 class=\"category-title $row[genres_naam] \"> $row[genres_naam]</h2>
            ";

            $nullStmt = "UPDATE series SET series_genre=0 WHERE series_genre IS NULL";
            $nullStmtResult = $dbh->query($nullStmt);

            $stmt = "SELECT * FROM series WHERE series_genre =  $row[genres_id]";
            $stmtResult = $dbh->query($stmt);
            $stmtResultCheck = $stmtResult->fetchAll();
            $stmtResultCount = count($stmtResultCheck);

            if ($stmtResultCount > 0) {
                echo " <div class=\"category-series\"> ";
                foreach ($stmtResultCheck as $stmtRow) {
                    echo "
                    
                        <figure>
                            <img onclick=\"location.href='watch.php?id=$stmtRow[series_id]';\" src=\"imgs/series-covers/$stmtRow[series_cover]\" alt=\"Series cover\">
                            <figcaption>$stmtRow[series_naam]</figcaption>
                        </figure>
                    
                    
                    ";
                }
                echo "</div>";
            }
            if ($stmtResultCount < 1) {
                echo "<script>
                            titel = document.querySelector(\".$row[genres_naam]\")
                            
                            titel.style.display = \"none\";
                          
                        </script>";
            }

        }

}
