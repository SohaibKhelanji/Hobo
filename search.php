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

<div id="search-bar">

    <form method="post">
        <input type="text" required placeholder="Serie titel" name="search">
        <label>
            <input hidden type="submit" name="submit" id="submit">
            <i class="material-icons">search</i>
        </label>
    </form>

</div>



<?php

$con = new PDO("mysql:host=localhost;dbname=hobo",'root','');

if (isset($_POST["submit"])) {
    $str = $_POST["search"];
    $sth = $con->prepare("SELECT * FROM series WHERE series_naam = '$str'");

    $sth->setFetchMode(PDO:: FETCH_OBJ);
    $sth -> execute();

    if($row = $sth->fetch())
    {



        echo " <div id='search-results'>
                 <figure>
                    <img onclick=\"location.href='watch.php?id=$row->series_id';\" src=\"imgs/series-covers/$row->series_cover\" alt=\"Series cover\">
                    <figcaption>$row->series_naam</figcaption>
                 </figure>";
    }






    else{
        echo " <div id='noResults-text'> 
                    <p> Er zijn geen zoekresultaten voor \"$str\" gevonden </p>
               </div>     
                    ";

    }


}


?>

</body>
