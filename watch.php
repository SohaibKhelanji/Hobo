<?php
session_start();
if (!isset($_SESSION['gebruikerid'])) {
    header('location: login.php');
}
include 'includes/header.php';

$serieId = "$_GET[id]";
$userId = $_SESSION["gebruikerid"];
$_SESSION["gebruikerlaatstbekeken"] = $serieId;
$dbh = mysqli_connect("localhost", "root", "", "hobo");
$sql = "SELECT * FROM `series` WHERE series_id = '$serieId'";
$result = mysqli_query($dbh,$sql);
$resultCheck = mysqli_num_rows($result);


$updateStmt = "UPDATE users SET users_laatstbekeken=$serieId WHERE users_id=$userId";
$updateStmtResult = $dbh->query($updateStmt);

?>

<body>
<div id="login-logo-wrapper">
    <div id="logo-wrapper">
        <img src="imgs/logo.png" alt="HOBO logo" onclick="location.href='series.php';" style="cursor: pointer">
    </div>
</div>
<?php
 if($row = mysqli_fetch_assoc($result)) {

 echo "<div id=\"seriesshower\">
            <video height='400px' width='100%'  autoplay controls>
            <source src=\"vids/$row[series_bron]\" type=\"video/mp4\">
            Your browser does not support the video tag.
            </video>
            <br>
            <h1>$row[series_naam]</h1>
            <p style='width: 950px'>$row[series_beschrijving]</p>
            <p>$row[series_jaar]</p>
            <a href='$row[series_imdb]' target='_blank'>IMDB Link</a>
        </div>
        ";
}

?>

</body>