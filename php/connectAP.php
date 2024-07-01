<?php
if ($_SESSION["auth"] == true) {
    $cmd = "sudo create_ap -m bridge $_GET[apHost] $_GET[interface] $_GET[ssid] $_GET[pass] > /dev/null 2>/dev/null &";

    exec(sprintf($cmd));
}
