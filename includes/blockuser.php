<?php
session_start();
if (!isset($_SESSION['gebruikerid']) && (!$_SESSION['gebruikeradmin']=="1" )) {
    header('location: index.php');
}

$servername ="localhost";
$username ="root";
$password ="";
$database ="hobo";

$user_id= $_GET['id'];


$connection =new mysqli($servername, $username, $password, $database);
$sql= "SELECT users_blocked FROM users WHERE users_id='$user_id'";

$result =$connection->query($sql);
while($row = $result->fetch_assoc()){
    $is_blocked= $row['users_blocked'];

    if($is_blocked==0){
        $stmt="UPDATE users SET users_blocked='1' WHERE users_id='$user_id'";
        $stmt_result=$connection->query($stmt);
    }
    else{
        $stmt="UPDATE users SET users_blocked='0' WHERE users_id='$user_id'";
        $stmt_result=$connection->query($stmt);
    }
    if($stmt_result){
        header('location:../useradmin.php?error=blokkerennone');
    }
    else{
        header('location:../useradmin.php?error=blokkerenfailed');
    }




}