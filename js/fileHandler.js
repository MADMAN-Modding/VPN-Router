// Object for everything to use
var xhr = new XMLHttpRequest();

// Lists the vpn configs
list();

// Function to list he configs
function list() {
    // Response function to update the inner html of a supplied id
    response("openVPNConfigurations");

    // Tells the php file to scan the directory of configs
    xhr.open('GET', 'php/listFiles.php');

    xhr.send();
}

// This removes a config file
function removeFile(file) {

    // Debug log
    console.log("php/deleteFile.php?file=" + file);

    // Opens and sends the request with the desired file
    xhr.open('GET', "php/deleteFile.php?file=" + file);

    xhr.send();

    // Then lists all the configs again so the page is up to date
    list();
}

// Response function that as long as it gets a 200 response code it will update the supplied id
function response(id) {
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                document.getElementById(id).innerHTML =
                    xhr.responseText;
            } else {
                console.log('Error Code: ' + xhr.status);
                console.log('Error Message: ' + xhr.statusText);
            }
        }
    }
}