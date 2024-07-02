<?php
// Starts a session for auth verification
session_start();

if ($_SESSION["auth"] == true) {
    // Runs the openvpn command and what file to use for authentication
    echo ("sudo openvpn --config \"../vpnConfigs/$_GET[config]\" --auth-user-pass ../auth/\"$_GET[config].auth\"");
}
// > /dev/null 2>/dev/null &