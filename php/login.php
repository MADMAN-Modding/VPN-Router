<?php
session_start();

if ($_POST["username"] == "admin" && $_POST["password"] == "admin") {
    $_SESSION["auth"] = true;
    echo "<h1>Login succeeded</h1>";
    echo " <meta http-equiv=\"refresh\" content=\"3; url='../index.php'\" />";
} else {
    echo "Wrong info";
}
