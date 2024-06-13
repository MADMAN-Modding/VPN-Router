<?php
    $cmd = "sudo create_ap -m bridge wlx00259ca41e9a eno1 $_GET[ssid] $_GET[pass] > /dev/null &";

    exec(sprintf($cmd));