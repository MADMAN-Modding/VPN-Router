<?php
session_start();

// Verification
if ($_SESSION["auth"] == true) {
    $deleteFile = new DeleteFile();

    // Overly complicated way of deleting the file
    $deleteFile->delete($_GET["file"]);

    class DeleteFile
    {
        function delete(String $file)
        {
            // Checks if the file is a .opvn file or .conf file to prevent deleting files that shouldn't be deleted
            if (str_contains($file, ".ovpn") || str_contains($file, ".conf")) {
                // Deletes the file
                unlink("../vpnConfigs/$file");
            };
        }
    }
}
