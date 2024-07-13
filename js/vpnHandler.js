// This function tells the openVPN connect file what config to use
function connect(config) {
    addDNS();

    var xhr = new XMLHttpRequest();

    console.log("php/openVPN/connect.php?config='" + config + "'");

    // response("open");

    xhr.open('GET', 'php/openVPN/connect.php?config="' + config + '"');

    xhr.send();

    list();
}

function addDNS() {
    var xhr = new XMLHttpRequest();

    xhr.open('GET', "php/openVPN/searchDNS.php");

    xhr.send();
}