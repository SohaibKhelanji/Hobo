<?php
session_start();
if (!isset($_SESSION['gebruikerid'])) {
    header('location: login.php');
}
include 'includes/header.php';
?>
<body>
<?php
include 'includes/navBar.php';
?>

<h1 style='text-align: center;margin-left: 22px'>Als laatst bekeken</h1>
<br>

<div class="last-watched">
<?php
include 'includes/showLastWatched.php';
?>
</div>
</body>

