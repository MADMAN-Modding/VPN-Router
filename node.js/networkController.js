var iwlist = require('wireless-tools/iwlist');

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

module.exports = {
    scanNetworks
};