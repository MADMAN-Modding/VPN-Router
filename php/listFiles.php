<?php
    $lister = new ListFiles();

    $lister->videoOutput();

    class ListFiles {
        public $directory = "../vpnConfigs";

        function videoOutput()
        {
            // Scans the videos
            if ($videoFinder = opendir($this->directory)) {
    
                // Makes the videoList array
                $videoList = [];
    
                // Reads the directory till the end
                while (false !== ($video = readdir($videoFinder))) {
                    // Adds each video to the list
                    $videoList[] = $video;
                }
    
                // Alphabetically sorts the videos
                natsort($videoList);
    
                // Removes . and .. from the array
                array_splice($videoList, 0, 2);
    
                // Closes the directory to save resources
                closedir($videoFinder);
            }
    
    
            for ($i = 0; $i < count($videoList); $i++) {
                    $this->load($videoList[$i]);
            }
        }

        function load(String $video) {
            // Echos the data and buttons for file handling, also changes the video name to look nice
            echo "<h4 class=\"video\" id=\"$video\">$video<a href=\"videos/$video\" download><img src=\"images/Download Button.png\" class=\"download\"/></a>
        <img src=\"images/Trash Button.png\" id=\"delete\" class=\"delete\" onclick='fileDelete(\"$video\")'/></h4> \n";

    }
    }