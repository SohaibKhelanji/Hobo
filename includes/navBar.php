<div id="navbar-wrapper">
    <div id="logo-wrapper">
        <img src="imgs/logo.png" alt="HOBO logo" onclick="location.href='index.php';" style="cursor: pointer">
    </div>
    <div id="navigation-wrapper">
        <?php
             if (isset($_SESSION["gebruikerid"]) && ($_SESSION["gebruikeradmin"]=="1" )) {

                 echo "<i class=\"material-icons\" onclick=\"location.href='series.php';\">movie</i>
                        <i class=\"material-icons\" onclick=\"location.href='search.php';\">search</i>
                        <i class=\"material-icons\" onclick=\"location.href='history.php';\">history</i>
                        <i class=\"material-icons\" onclick=\"location.href='admin.php';\">person</i>";
             }
             elseif (isset($_SESSION["gebruikerid"])) {
                 echo  "<i class=\"material-icons\" onclick=\"location.href='series.php';\">movie</i>
                    <i class=\"material-icons\" onclick=\"location.href='search.php';\">search</i>
                    <i class=\"material-icons\" onclick=\"location.href='history.php';\">history</i>
                    <i class=\"material-icons\" onclick=\"location.href='profile.php';\">person</i>";
             }else
                 echo " <a href='login.php'>Login</a>";


             ?>
    </div>
</div>



<style>

    #navbar-wrapper {
        height: 140px;
        width: 100%;
        background-color: black;
        font-weight: bold;
        overflow: hidden;

    }

    #logo-wrapper {
        margin-left: 10px;
        float: left;
        margin-top: 25px;
    }

    #logo-wrapper img {
        height: 100px;
        width: 300px;
    }

    #navigation-wrapper {
        float: right;
        margin-right: 20px;

    }


    #navigation-wrapper i {
        font-size:45px;
        color:#92d050;
        cursor:pointer;
        padding: 20px;
        line-height: 130px;
    }

    #navigation-wrapper i:hover {
        color: #5B9BD5;
        transition: color 0.5s;
        cursor: pointer;
    }

    #navigation-wrapper a {
        font-size:30px;
        color:#92d050;
        cursor:pointer;
        padding: 20px;
        line-height: 160px;
        text-decoration: none;
        font-family: 'Noto Sans JP', sans-serif;
    }

    #navigation-wrapper a:hover {
        color: #5B9BD5;
        transition: color 0.5s;
        cursor: pointer;
    }

</style>