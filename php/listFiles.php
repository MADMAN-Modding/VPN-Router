<?php
session_start();

// Checks authentication
if ($_SESSION["auth"] == true) {
    class ListFiles
    {
        // Sets the directory to search
        public $directory = "../vpnConfigs";

        function configOutput()
        {
            // Scans the configs
            if ($configFinder = opendir($this->directory)) {

                // Makes the configList array
                $configList = [];

                // Reads the directory till the end
                while (false !== ($config = readdir($configFinder))) {
                    // Adds each config to the list
                    $configList[] = $config;
                }

                // Alphabetically sorts the configs
                natsort($configList);

                // Removes . and .. from the array
                array_splice($configList, 0, 2);

                // Closes the directory to save resources
                closedir($configFinder);
            }

            // List every file found
            for ($i = 0; $i < count($configList); $i++) {
                $this->load($configList[$i]);
            }
        }

        function load(String $config)
        {
            // Echos the data and buttons for file handling
            echo "<h4 class=\"config\" id=\"$config\">$config<button onclick='connect(\"$config\")'>Connect</button>
        <img src=\"images/Trash Button.png\" id=\"delete\" class=\"delete\" onclick='removeFile(\"$config\")'/></h4> \n";
        }
    }
    $lister = new ListFiles();

    $lister->configOutput();
}
