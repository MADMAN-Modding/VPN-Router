<?php
// Starts a session for auth verification
session_start();

if ($_SESSION["auth"] == true) {
    include "addDNS.php";

    $handle = new SplFileObject("../../vpnConfigs/OpenVPN Server.ovpn");

    foreach ($handle as $line) {
        if (str_contains($line, "dhcp-option DNS"))
            write(str_replace("dhcp-option DNS ", "", $line));
    }
}
