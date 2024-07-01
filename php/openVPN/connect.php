<?php
if ($_SESSION["auth"] == true) {
    echo ("sudo openvpn --config \"../vpnConfigs/$_GET[config]\" --auth-user-pass ../auth/\"$_GET[config].auth\"");
}
// > /dev/null 2>/dev/null &