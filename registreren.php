<?php
include 'includes/header.php'
?>
<body id="login-body">
<div id="login-logo-wrapper">
    <div id="logo-wrapper">
        <img src="imgs/logo.png" alt="HOBO logo" onclick="location.href='index.php';" style="cursor: pointer">
    </div>
</div>
<?php
include 'includes/registerForm.php'
?>
</body>

<style>
    .login {
        width: 400px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 40px;
        background: black;
        border-radius: 15px;
        box-shadow: 5px 10px 8px black;
    }
    .login h1 {
        text-align: center;
        color: #92d050;
        font-size: 40px;
        padding: 20px 0 20px 0;

    }
    .login form {
        display: block;
        flex-wrap: wrap;
        justify-content: center;
        padding-top: 20px;
    }

    .login form input[type="password"], .login form input[type="text"] {
        width: 220px;
        height: 50px;
        border: 1px solid #dee0e4;
        margin-bottom: 20px;
        margin-left: auto;
        margin-right: auto;
        display: block;
    }
    .login form input[type="submit"] {
        width: 150px;
        padding: 15px;
        margin-top: 10px;
        background-color:#92d050;
        border: 0;
        cursor: pointer;
        font-weight: bold;
        color: #ffffff;
        transition: background-color 0.2s;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    .login form input[type="submit"]:hover {
        background-color: #5B9BD5;
        transition: background-color 0.2s;
    }

    .login form p {
        margin-block: 10px;
        text-align: center;
        color: #92d050;
    }

    .login form p a {
        color: #5B9BD5;
        text-decoration: none;
    }

    .login form p a:hover {
        color: blue;
        text-decoration: none;
    }


</style>