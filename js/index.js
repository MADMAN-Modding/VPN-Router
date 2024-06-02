let jsonMap; 

list();

function list() {
    jsonMap = JSON.parse(document.getElementById('networks').innerHTML);

    document.getElementById('organizedNetworks').innerHTML += '<table>\n';
    for(let i = 0; i < Object.keys(jsonMap).length; i++) {
        console.log(jsonMap[i].ssid);
        document.getElementById('organizedNetworks').innerHTML += '\t' + jsonMap[i].ssid + '\n';
    }
    document.getElementById('organizedNetworks').innerHTML += '</table>\n';
}