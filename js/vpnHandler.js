function connect(config) {
    var xhr = new XMLHttpRequest();

    console.log("php/openVPN/connect.php?config='" + config + "'");

    response("open");

    xhr.open('GET', 'php/openVPN/connect.php?config="' + config + '"');

    xhr.send();

    list();
}