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

    if (filename == "./") filename = "./index.html";

    fs.readFile(filename, function(err, data) {
      if (err) {
        res.writeHead(404, {'Content-Type': 'text/html'});
        return res.end("404 Not Found");
      } else {
        res.writeHead(200, {'Content-Type': 'text/html'});
        res.write(data);
        res.write(net.scan + " test");
        return res.end();
      }
    });

  }
}).listen(8080);
