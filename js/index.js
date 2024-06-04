let jsonMap; 

function list() {
    jsonMap = JSON.parse(document.getElementById('networks').innerHTML);

    document.getElementById('organizedNetworks').innerHTML = "";

    var organizedNetworks = document.getElementById('organizedNetworks').innerHTML;
    organizedNetworks += '<table style="width:100%">\n';

    organizedNetworks += "\t<tr>\n\t\t<th>SSID</th>\n\t\t<th>Signal Strength</th>\n\t\t<th>Security</th>\n\t\t</tr>";

    for(let i = 0; i < Object.keys(jsonMap).length; i++) {
        organizedNetworks += "\n\t<tr>"
        organizedNetworks += '\n\t\t<td>' + jsonMap[i].ssid + '</td>';
        organizedNetworks += '\n\t\t<td>' + jsonMap[i].signal + '</td>';
        organizedNetworks += '\n\t\t<td>' + jsonMap[i].security + '</td>';
        organizedNetworks += "\n\t</tr>"
    }
    organizedNetworks += '\n</table>';

    document.getElementById('organizedNetworks').innerHTML = organizedNetworks;
}