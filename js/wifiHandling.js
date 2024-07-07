function listNetworks() {
    var xhr = new XMLHttpRequest();

    response("networks");

    xhr.open("GET", "../php/netControl/netList.php");

    xhr.send();

}