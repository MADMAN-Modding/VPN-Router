var iwlist = require('wireless-tools/iwlist');
const Hostapd = require('hostapd-config');
// var hostapd = require('wireless-tools/hostapd');

function scanNetworks() {
      return new Promise((resolve, reject) => {
        iwlist.scan({ iface : 'wlan0', show_hidden : false }, function(err, networks) {
            if (err) {
                console.log(err);
                reject(err);
            } else {
                resolve(networks);
            }
    })
})};

// var options = {
//     channel: 6,
//     driver: 'nl80211',
//     hw_mode: 'g',
//     interface: 'wlan1',
//     ssid: 'RaspberryPi',
//     wpa: 2,
//     wpa_passphrase: 'raspberryEOF',
// };  

const options = {
    iface: 'wlan1',
    ssid: 'Test',
    driver: 'nl80211',
    wpaPassphrase: 'supersecretpassword'
};

const hostapd = new Hostapd(options);

function hotSpot() {
    hostapd.start().then(result => {
        console.log(`Hostapd started with code ${result.code}`);
      }).catch(err => {
        console.log(`Hostapd failed to start: ${err.message}`);
        console.log(err);
      });
    // hostapd.enable(options, function(err) {
    //     console.log(err);
    // });
}

module.exports = {
    scanNetworks,
    hotSpot
};