<?php
session_start();
if (!isset($_SESSION['gebruikerid'])) {
    header('location: login.php');
}
include 'includes/header.php'
?>
<body>
<?php
include 'includes/navBar.php'
?>




<div id = "userinfo" >
    <h1 > Gebruikersprofiel</h1 >
    <br >
    <label for="voornaam" > Voornaam:</label >
    <input readonly type = "text" id = "voornaam" name = "voornaam" value = "<?php echo ucfirst($_SESSION["gebruikervoornaam"])?>">
    <br >
    <br >
    <label for=\"achternaam\" > Achternaam:</label >
    <input readonly type = "text\" id = "voornaam\" name = "voornaam" value = "<?php echo ucfirst($_SESSION["gebruikerachternaam"])?>">
    <br >
    <br >
    <label for="email" > Email:</label >
    <input readonly type = "text" id = "email" name = "email" value = "<?php echo ucfirst($_SESSION["gebruikeremail"])?>">
    <br >
    <br >
    <button id = "logoutbutton" onclick = "location.href = 'includes/logout.inc.php'" > Uitloggen</button >
</div >




</body>
