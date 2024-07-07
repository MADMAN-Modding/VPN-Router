<?php
exec("nmcli dev wifi", $output);
echo $output;
