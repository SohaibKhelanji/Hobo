<?php
session_start();
if (!isset($_SESSION['gebruikerid']) && (!$_SESSION['gebruikeradmin']=="1" )) {
    header('location: index.php');
}
include 'includes/header.php'
?>
<body>

<div id="adminnav">

    <a id="naarhoboadmin" href="admin.php">Terug</a>

</div>


<h1 style="text-align: center">Functies</h1>
<br>
<div id="content-manager-buttons">
    <button class="serieToevoegen-button showgenreopen-button"><span>Genres Bekijken</span></button>
    <button class="serieToevoegen-button open-button"><span>Serie Toevoegen</span></button>
    <button class="serieToevoegen-button genreopen-button"><span>Genre Toevoegen</span></button>
</div>
<?php if (isset($_GET["error"])) {
    if ($_GET["error"] == "serienone") {
        echo "<p style='color:#7FB319;text-align: center'>Serie is sucsessvol toegevoegd!</p>";
    }
    else if ($_GET["error"] == "stmtgefaald") {
        echo "<p style='color:red;text-align: center'>Oeps er is een onverwachte fout opgetreden<br> probeer het opnieuw.</p>";
    }
    else if ($_GET["error"] == "videobestandverkeerd") {
        echo "<p style='color:red;text-align: center'>Het gekozen videobestand word niet ondersteund <br> kies een ander bestand en probeer het opnieuw. </p>";
    }
    else if ($_GET["error"] == "coverbestandverkeerd") {
        echo "<p style='color:red;text-align: center'>Het gekozen coverbestand word niet ondersteund <br> kies een ander bestand en probeer het opnieuw.</p>";
    }
    else if ($_GET["error"] == "videobestanderror") {
        echo "<p style='color:red;text-align: center'>Er is een fout opgetreden bij het toevoegen van het videobestand<br> probeer het opnieuw.</p>";
    }
    else if ($_GET["error"] == "coverbestanderror") {
        echo "<p style='color:red;text-align: center'>Er is een fout opgetreden bij het toevoegen van het videobestand<br> probeer het opnieuw.</p>";
    }
    else if ($_GET["error"] == "bewerkennone") {
        echo "<p style='color:#7FB319;text-align: center'>Serie is sucsessvol bewerkt!</p>";
    }
    else if ($_GET["error"] == "bewerkengefaald") {
        echo "<p style='color:red;text-align: center'>Er is een fout opgetreden bij het bewerken van de serie<br> probeer het opnieuw.</p>";
    }
}?>
<br>
<h1 style="text-align: center">Content</h1>

<?php
include_once ('includes/showSeriesContentManager.php');
?>


<dialog class="modal" id="modal">
    <button class="sluiten close-button">X</button>
    <h2>Serie toevoegen</h2>
    <p>Vul hier de gegevens in van de Serie die u wilt toevoegen.</p>
    <br>
    <form class="form" action="includes/addSeries.php" method="post" enctype="multipart/form-data">
        <label>Titel <input id="serienaam" name="serienaam" type="text" required></label>
        <label>Uitgave jaar <input id="seriejaar" name="seriejaar" type="tel" required maxlength="4"></label>
        <label>Genre <select name="seriegenre" id="seriegenre" required>
                        <?php $dbh =  new PDO("mysql:host=localhost;dbname=hobo",'root','');
                        $sql = "SELECT * FROM genres ORDER BY genres_naam ASC ";
                        $result = $dbh->query($sql);
                        $resultCheck = $result->fetchAll();
                        $resultCount = count($resultCheck);

                        if ($resultCount > 0 ) {
                            foreach ($resultCheck as $row) {
                                echo " 
                                 <option value=\"$row[genres_id]\">$row[genres_naam]</option>
                                ";
                            }
                        }?>
                     </select>
        </label>
        <label>IMDB link <input id="serieimdb" name="serieimdb" type="text" required></label>
        <label>Beschrijving <textarea required rows="5" cols="25" name="seriebeschrijving"></textarea></label>
        <label>Cover<input style="cursor: pointer" type="file" name="seriecover" required ></label>
        <label>Video<input style="cursor: pointer" type="file" name="seriebron" required></label>
        <label>Editors pick <input type="checkbox" name="serieeditorspick" id="serieeditorspick" value="" style="cursor: pointer" onclick="checkBox()"></label>

        <br>
        <input id="modal-toevoegen" type="submit" name="submit" value="Toevoegen">
    </form>
</dialog>


<dialog class="genre-modal" id="genre-modal">
    <button class="sluiten genreclose-button">X</button>
    <h2>Genre toevoegen</h2>
    <p>Vul hier het genre in dat u wilt toevoegen.</p>
    <form class="form" action="includes/addGenre.php" method="post">
        <label>Genre <input name="genrenaam" type="text" required></label>
        <br>
        <input id="modal-toevoegen" type="submit" name="submit" value="Toevoegen">
</dialog>

<dialog class="showgenre-modal" id="showgenre-modal">
    <button class="sluiten showgenreclose-button">X</button>
    <h2>Genres bekijken</h2>
    <p>Bekijk en verwijderen hier de bestaande genres.</p>
    <table>
    <thead>
    <th> <h2 style="text-align: center">Genres</h2> </th>
    <th> <h2 style="text-align: center">Actie</h2>  </th>
    </thead>
    <tbody>
    <?php

    $stmt = "SELECT * FROM genres WHERE genres_id > 0";
    $stmtResult = $dbh->query($stmt);
    $stmtResultCheck = $stmtResult->fetchAll();
    $stmtResultCount = count($stmtResultCheck);

    if ($stmtResultCount > 0 ) {
        foreach ($stmtResultCheck as $row) {
            echo " 
                 <tr> 
                <td>$row[genres_naam]</td>
                <td><button id='actie-button-verwijderen-genre' onclick=\"location.href= 'includes/deleteGenres.php?id=$row[genres_id]' \">Verwijderen</button></td>
                </tr>
                ";
        }
    } ?>
    </tbody>
    </table>


</dialog>



</body>

<script>

    const modal = document.querySelector("#modal");
    const genreModal = document.querySelector("#genre-modal");
    const showGenreModal = document.querySelector("#showgenre-modal");
    const openModal = document.querySelector(".open-button");
    const closeModal = document.querySelector(".close-button");
    const openModalGenre = document.querySelector(".genreopen-button");
    const closeModalGenre = document.querySelector(".genreclose-button");
    const openModalShowGenre = document.querySelector(".showgenreopen-button");
    const closeModalShowGenre = document.querySelector(".showgenreclose-button");



    openModal.addEventListener("click", () => {
        modal.showModal();
    });


    closeModal.addEventListener("click", () => {
        modal.close();
    });

    openModalGenre.addEventListener("click", () => {
        genreModal.showModal();
    });


    closeModalGenre.addEventListener("click", () => {
        genreModal.close();
    });

    openModalShowGenre.addEventListener("click", () => {
        showGenreModal.showModal();
    });


    closeModalShowGenre.addEventListener("click", () => {
        showGenreModal.close();
    });




    function checkBox() {
        var checkBox = document.getElementById("serieeditorspick");

        if (checkBox.checked == true){
            checkBox.value = "1";
        } else {
            checkBox.value = "0";
        }
    }

</script>