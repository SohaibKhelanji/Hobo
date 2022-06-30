<div class="login">
    <h1>Login</h1>
    <form action="includes/login.inc.php" method="post">
        <input type="text" name="email" placeholder="Email" id="email" required>
        <input type="password" name="password" placeholder="Wachtwoord" id="password" required>
        <input type="submit" name="submit" value="Login">
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "verkeerdeinloggegevens") {
                echo "<p style='color:red'>Het ingevoerde e-mailadres of wachtwoord is onjuist. <br> Probeer het alstublieft nog een keer.</p>";
            }elseif ($_GET["error"] == "gebruikernietgevonden") {
                echo "<p style='color:red'>Gebruiker niet gevonden, <br> check uw ingevoerde e-mail <br>en probeer het alstublieft nog een keer</p>";
            }elseif ($_GET["error"] == "stmt1failed") {
                echo "<p style='color:red'>oeps er is een onverwachte fout opgetreden,<br> probeer het later opnieuw.</p>";
            }
            elseif ($_GET["error"] == "blocked") {
                echo "<p style='color:red'>Uw account is geblokkeerd</p>";
            }
        }
        ?>
        <p>Nog geen account?<br><a href="registreren.php">Meld je aan!</a> </p>
    </form>
</div>



<style>
    .login {
        width: 400px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 60px;
        background: black;
        border-radius: 15px;
        box-shadow: 5px 10px 8px black;
    }
    .login h1 {
        text-align: center;
        color: #92d050;
        font-size: 40px;
        padding: 20px 0 20px 0;

    }
    .login form {
        display: block;
        flex-wrap: wrap;
        justify-content: center;
        padding-top: 20px;
    }

    .login form input[type="password"], .login form input[type="text"] {
        width: 220px;
        height: 50px;
        border: 1px solid #dee0e4;
        margin-bottom: 20px;
        margin-left: auto;
        margin-right: auto;
        display: block;
    }
    .login form input[type="submit"] {
        width: 100px;
        padding: 15px;
        margin-top: 10px;
        background-color:#92d050;
        border: 0;
        cursor: pointer;
        font-weight: bold;
        color: #ffffff;
        transition: background-color 0.2s;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    .login form input[type="submit"]:hover {
        background-color: #5B9BD5;
        transition: background-color 0.2s;
    }

    .login form p {
        margin-block: 10px;
        text-align: center;
        color: #92d050;
    }

    .login form p a {
        color: #5B9BD5;
        text-decoration: none;
    }

    .login form p a:hover {
        color: blue;
        text-decoration: none;
    }


</style>
