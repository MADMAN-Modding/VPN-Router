<?php
session_start();

// Authentication validation
if ($_SESSION["auth"] == true) {
    // What directory to upload to
    $targetDir = "../vpnConfigs/";
    $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $fileType != "ovpn" && $fileType != "conf"
    ) {
        echo " Sorry, only ovpn & conf files are allowed. ";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo " Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded. You will be redirected soon";
            echo "<meta http-equiv=\"refresh\" content=\"3; url='../index.php\" />";
        } else {
            echo " Sorry, there was an error uploading your file.";
        }
    }
}
