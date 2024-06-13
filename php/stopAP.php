<?php
    exec("sudo pkill create_ap", $output);

    print_r($output);