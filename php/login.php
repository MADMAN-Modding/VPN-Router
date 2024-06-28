<?php
    if ($_POST["username"] == "admin" && $_POST["password"] == "admin") {
        echo " <meta http-equiv="refresh" content="7; url='../index.html'" />";
    } else {
        echo "Wrong info";
    }