<?php
session_start();
include 'includes/header.php'
?>
<body>
<?php
include 'includes/navBar.php';
include 'includes/slideshow.php';
?>


<h2 class="category-title">Editors pick</h2>
<div class="category-series">
    <?php include_once ('includes/showEditorspick.php');?>
</div>

<?php
if (isset($_SESSION['gebruikerid'])) {

    echo "
    
    <h2 class=\"category-title\" > Series</h2 >
    <div id = \"serieswrapper\" >";
        include_once('includes/showSeries.php');
    echo"</div >
    <div id='MeerSeriesButton-Wrapper'>
    <a id = \"MeerSeriesButton\" href = \"series.php\" > Meer series </a >
    </div>";
}
?>

</body>
</html>
