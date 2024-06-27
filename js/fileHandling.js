    var xhr = new XMLHttpRequest();


list();

function list() {

    response("openVPNConfigurations");

    xhr.open('GET', 'php/listFiles.php');

    xhr.send();
}

function removeFile(file) {

    xhr.open('GET', 'php/deleteFile.php' + file);

    xhr.send();

    list();
}

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