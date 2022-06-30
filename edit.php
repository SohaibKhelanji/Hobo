<?php
session_start();
if (!isset($_SESSION['gebruikerid']) && (!$_SESSION['gebruikeradmin']=="1" )) {
    header('location: index.php');
}
include 'includes/header.php';

$serieId = $_GET['id'];

?>
<body>

<div id="adminnav">

    <a id="naarhoboadmin" href="contentmanager.php">Terug</a>

</div>

<div class="edit-form">
<?php
$dbh = new PDO("mysql:host=localhost;dbname=hobo", 'root', '');
$sql = "SELECT * FROM `series` WHERE series_id='$serieId';";
$result = $dbh->query($sql);
$resultCheck = $result->fetchAll();
$resultCount = count($resultCheck);
if ($resultCount > 0 ) {
    foreach ($resultCheck as $row) {
        echo "<form class=\"form\" action=\"includes/updateSeries.php?id=$serieId\" method=\"post\">
        <label>Titel <input id=\"serienaam\" name=\"serienaam\" type=\"text\" value='$row[series_naam]' required></label>
        <label>Uitgave jaar <input id=\"seriejaar\" name=\"seriejaar\" type=\"tel\" required maxlength=\"4\" value='$row[series_jaar]'></label>
        <label>Genre <select name=\"seriegenre\" id=\"seriegenre\" required>";

        $genreStmt = "SELECT * FROM genres WHERE genres_id = $row[series_genre] ";
        $genreStmtResult = $dbh->query($genreStmt);
        $genreStmtResultCheck = $genreStmtResult->fetchAll();
        $genreStmtResultCount = count($genreStmtResultCheck);

        if ($genreStmtResultCount > 0 ) {
            foreach ($genreStmtResultCheck as $genreStmtRow) {
                echo "
                       <option value=\"$genreStmtRow[genres_id]\" selected hidden>$genreStmtRow[genres_naam]</option>
                      ";
            }
        }

                        $stmt = "SELECT * FROM genres ORDER BY genres_naam ASC ";
                        $stmtResult = $dbh->query($stmt);
                        $stmtResultCheck = $stmtResult->fetchAll();
                        $stmtResultCount = count($stmtResultCheck);

                        if ($stmtResultCount > 0 ) {
                            foreach ($stmtResultCheck as $stmtRow) {
                                echo "
                                 <option value=\"$stmtRow[genres_id]\">$stmtRow[genres_naam]</option>
                                ";
                            }
                        }
echo "</select>
</label>
<label>IMDB link <input id=\"serieimdb\" name=\"serieimdb\" type=\"text\" value='$row[series_imdb]' required></label>
<label>Beschrijving <textarea required rows=\"5\" cols=\"25\" name=\"seriebeschrijving\">$row[series_beschrijving]</textarea></label>
<label>Editors pick <input type=\"checkbox\" name=\"serieeditorspick\" id=\"serieeditorspick\" value=\"$row[series_editorspick]\" style=\"cursor: pointer\" onclick=\"checkBox()\"></label>

<br>
<input id=\"modal-toevoegen\" type=\"submit\" name=\"submit\" value=\"Updaten\">
</form>";
    }
}

?>

</div>
<br>

<script>
    var checkBoxElement = document.getElementById("serieeditorspick");
    function checkBox() {
        if (checkBoxElement.checked == true){
            checkBoxElement.value = "1";
        } else {
            checkBoxElement.value = "0";
        }
    }

    checkBoxElement.checked = checkBoxElement.value == "1";

</script>