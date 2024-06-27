<?php 

$deleteFile = new DeleteFile();

class DeleteFile {
    function delete(String $file) {
        if (str_contains($file, ".ovpn") || str_contains($file, ",conf")) {
            unlink("../vpnConfigs/$file");
        };
    }
}