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

<?php
include 'includes/showSeriesByCategory.php'
?>


</body>
