<?php
session_start();

if ($_SESSION["auth"] == true) {
    exec("sudo pkill create_ap");
}
