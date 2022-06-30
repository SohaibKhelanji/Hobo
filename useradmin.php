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

<h1 style="text-align: center;">Gebruikers</h1>

<?php if (isset($_GET["error"])) {
    if ($_GET["error"] == "adminnone") {
        echo "<p style='color:#7FB319;text-align: center'>Gebruikersrechten zijn succesvol bewerkt!</p>";
    } else if ($_GET["error"] == "adminfailed") {
        echo "<p style='color:red;text-align: center'>Er is een fout opgetreden bij het bewerken van de gebruikersrechten<br> probeer het opnieuw.</p>";
    }
    else if ($_GET["error"] == "blokkerennone") {
        echo "<p style='color:#7FB319;text-align: center'>Gebruikersstatus is succesvol bewerkt!</p>";
    }
    else if ($_GET["error"] == "blokkerfailed") {
        echo "<p style='color:red;text-align: center'>Er is een fout opgetreden bij het bewerken van de gebruikersstatus<br> probeer het opnieuw.</p>";
    }
}
    ?>

<table id ="users-table">
    <thead>
        <th><h2>Naam</h2></th>
        <th><h2>Achternaam</h2></th>
        <th><h2>Email</h2></th>
        <th><h2>Acties</h2></th>
    </thead>
    <tbody>
    <?php
    $servername ="localhost";
    $username ="root";
    $password ="";
    $database ="hobo";

    $connection =new mysqli($servername, $username, $password, $database);
    $sql= "SELECT * FROM users";
    $result =$connection->query($sql);


    while($row = $result->fetch_assoc()) {
        $is_admin = $row["users_admin"];
        $is_blocked = $row["users_blocked"];
    if ($row["users_email"] !== "admin@hobo.nl") {
        echo "<tr>
        <td>" . $row["users_voornaam"] . "</td>
        <td>" . $row["users_achternaam"] . "</td>
        <td>" . $row["users_email"] . "</td>
    <td>";


        if ($is_admin == 0) {
            echo " <button id='actie-button-positief' onclick=\"location.href= 'includes/makeadmin.php?id=" . $row["users_id"] . "' \">Admin maken</button>";

        } else {
            echo " <button id='actie-button-verwijderen' onclick=\"location.href= 'includes/makeadmin.php?id=" . $row["users_id"] . "' \">Admin weghalen</button>";
        }

        if ($is_admin == 0 ) {
            if ($is_blocked == 0) {
                echo " <button id='actie-button-verwijderen' onclick=\"location.href= 'includes/blockuser.php?id=" . $row["users_id"] . "' \">Blokkeren</button>";
            } else {
                echo "<button id='actie-button-positief' onclick=\"location.href= 'includes/blockuser.php?id=" . $row["users_id"] . "' \">Deblokkeren</button>";
            }
        }
    }

            echo "
    </td>
    </tr>";

    }


    ?>

    </tbody>
</table>

<br>

</body>

