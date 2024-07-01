<!DOCTYPE html>

<head lang="en">
    <title>VPN-Router</title>
    <meta charset="UTF-8">
    <link href="css/index.css" type="text/css" rel="stylesheet">
    <script src="js/index.js" defer></script>
    <script src="js/vpnHandler.js" defer></script>
    <script src="js/fileHandler.js" defer></script>
</head>

<?php

session_start();

if (!isset($_SESSION["auth"]) || $_SESSION["auth"] == false) {
    echo $_SESSION["auth"];
    print_r($_SESSION);

?>

    <body>
        <h1>Login</h1>
        <form action="php/login.php" method="post" enctype="multipart/form-data">

            <p>Username</p>
            <input type="text" name="username" id="username">

            <p>Password</p>
            <input type="password" name="password" id="password">
            <br>
            <input type="submit" value="Login">
        </form>
    </body>

<?php
    return;
}
?>

<body>
    <h1>Welcome to <a href="https://github.com/MADMAN-Modding/VPN-Router" target="_blank">VPN-Router</a>, created by <a href="https://github.com/MADMAN-Modding" target="_blank">MADMAN-Modding</a></h1>
    <h2>The aim of this project is to allow devices that can't use openVPN, or don't have the permissions to run
        openVPN, to be able to connect to an openVPN server.</h2>
    <div style="text-align: center;">
        <h4>Hotspot Controls</h4>
        <button onclick="startAP()">Start Hotspot</button>
        <button onclick="restartAP()">Restart Hotspot</button>
        <button onclick="stopAP()">Stop Hotspot</button>
    </div>
    <div id="openVPNControls">
        <h4>openVPN Controls</h4>
        <form action="php/uploadHandler.php" method="post" enctype="multipart/form-data">
            <p id="vpnUploadText">Select openVPN config to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Config" name="submit">
            </p>
        </form>
    </div>
    <div id="openVPNConfigurations"></div>
</body>