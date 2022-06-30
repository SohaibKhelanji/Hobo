<?php
session_start();
if (!$_SESSION['gebruikeradmin']=="1" ) {

    header('location: index.php');
}
include 'includes/header.php'
?>
<body>

    <div id="adminnav">

        <a id="naarhoboadmin" href="index.php">Naar Hobo</a>
        <a id="loguitadmin" href="includes/logout.inc.php">Uitloggen</a>

    </div>

   <div id="adminchoices-wrapper"> <figure class="adminchoices">
        <img src="imgs/contentmanager.png" alt="Content Manager" />
        <figcaption>
            <h2>Content  <span> Manager</span></h2>
        </figcaption>
        <a href="contentmanager.php"></a>
    </figure>
    <figure class="adminchoices main">
        <img src="imgs/useradmin.png" alt="User Admin" />
        <figcaption>
            <h2>Users  <span> Admin</span></h2>
        </figcaption>
        <a href="useradmin.php"></a>
    </figure>

   </div>



</body>