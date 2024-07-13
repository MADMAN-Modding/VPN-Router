<?php

function write(String $ip)
{
    exec("echo \"$ip\" | tee -a resolv.conf");
}
