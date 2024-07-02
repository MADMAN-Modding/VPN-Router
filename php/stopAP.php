<?php
// Starts the session
session_start();

// Checks the session token
if ($_SESSION["auth"] == true) {
    // Kills the access point process
    exec("sudo pkill create_ap");
}
