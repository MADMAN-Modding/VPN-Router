var iwlist = require('wireless-tools/iwlist');
var wpa_supplicant = require('wireless-tools/wpa_supplicant');
var iw = require('wireless-tools/iw');
const fs = require('fs');
// var ifconfig = require('wireless-tools/ifconfig');

// var options = {
//     interface: 'wlan0',
// }

// ifconfig.up(options, function(err){}) 

exports.scan = iwlist.scan({ iface : 'wlan0', show_hidden : true }, function(err, networks) {
    const net = networks;

    console.log(net);

    for (const key in net) {
        // if (Object.hasOwnProperty.call(networks, key)) {
        //     const element = networks[key];
        // }

        fs.writeFile('test.json', net[key], function (err) {
            if (err) throw err;
            console.log(net[key]);
        })
    }
    console.log(err);
});

// exports.scan = iw.scan({iface: 'wlan0', show_hidden : true}, function(err, networks){
//     return networks;
// })