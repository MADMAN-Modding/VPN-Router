<?php
session_start();

if ($_SESSION["auth"] == true) {
    $deleteFile = new DeleteFile();

    $deleteFile->delete($_GET["file"]);

    class DeleteFile
    {
        function delete(String $file)
        {
            if (str_contains($file, ".ovpn") || str_contains($file, ".conf")) {
                unlink("../vpnConfigs/$file");
            };
        }
    }
}
