const http = require('http');
const url = require('url');
const fs = require('fs');
const net = require('./networkController');
const formidable = require('formidable');

http.createServer(function (req, res) {
  if (req.url == '/fileUpload') {
    var form = new formidable.IncomingForm();
    form.parse(req, function (err, fields, files) {
      res.write('File uploaded');
      res.end();
    });
  } else {
    var q = url.parse(req.url, true);
    var filename = "." + q.pathname;

    // Sets the default file to index.html
    if (filename == "./") filename = "./index.html";

    net.hotSpot();

    // Loads the requested file
    fs.readFile(filename, function(err, data) {
      if (err) {
        res.writeHead(404, {'Content-Type': 'text/html'});
        return res.end("404 Not Found");
      } else {
        // Determine what type of file it's supposed to give
        if (filename.includes("css")) {
          var type = "css";
        } else if (filename.includes("js")) {
          var type = "javascript";
        }
        else {
          var type = "html";
        }
        res.writeHead(200, {'Content-Type': 'text/' + type});
        res.write(data);

        // Scans available networks
        if (filename.includes("html")) {
          net.scanNetworks().then(networks => {
            res.write("<p id='networks'>" + JSON.stringify(networks) + "</p>");
            res.end();
          }).catch(error => {
            res.write("Error scanning networks: " + error);
            res.end();
          });
        } else {
          res.end();
        }
      }
    });
  }
}).listen(8080);
