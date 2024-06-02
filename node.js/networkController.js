var iwlist = require('wireless-tools/iwlist');
var wpa_supplicant = require('wireless-tools/wpa_supplicant');
var iw = require('wireless-tools/iw');
// var ifconfig = require('wireless-tools/ifconfig');

// var options = {
//     interface: 'wlan0',
// }

// ifconfig.up(options, function(err){}) 

exports.scan = iwlist.scan({ iface : 'wlan0', show_hidden : true }, function(err, networks) {
    return networks;
    console.log(err);
});

// exports.scan = iw.scan({iface: 'wlan0', show_hidden : true}, function(err, networks){
//     return networks;
// })