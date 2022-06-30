<div class="login">
    <h1>Aanmelden</h1>
    <form action="includes/registreren.inc.php" method="post">
        <input type="text" name="voornaam" placeholder="Voornaam" id="voornaam" required>
        <input type="text" name="achternaam" placeholder="Achternaam" id="achternaam" required>
        <input type="text" name="email" placeholder="E-mail" id="email" required>
        <input type="password" name="wachtwoord" placeholder="Wachtwoord" id="wachtwoord" required>
        <input type="submit" name="submit" value="Aanmelden">
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "none") {
                echo "<p style='color:#7FB319;'>Account is sucsessvol geregistreerd!</p>";
            }
            else if ($_GET["error"] == "emailingebruik") {
                echo "<p style='color:red'>E-mail is al in gebruik! <br> Login in of probeer een andere E-mail.</p>";
            }
            else if ($_GET["error"] == "stmt1failed") {
                echo "<p style='color:red'>oeps er is een onverwachte fout opgetreden,<br> probeer het later opnieuw.</p>";
            }
            else if ($_GET["error"] == "stmt2failed") {
                echo "<p style='color:red'>oeps er is een onverwachte fout opgetreden,<br> probeer het later opnieuw.</p>";
            }
        }
        ?>
        <p>al een account?<a href="login.php">klik hier om in te loggen!</a></p>
    </form>
</div>
