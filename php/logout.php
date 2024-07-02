<?php
session_start();

// Removes the current session
session_destroy();

// Refreshes the page
echo "<meta http-equiv=\"refresh\" content=\"3; url='index.php'\" />";
