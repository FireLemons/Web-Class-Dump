// Created by Professor Wergeles for CS4830 at the University of Missouri

var app = require('http').createServer(handler);
var io = require('socket.io')(app);
var fs = require('fs');
var port = 8040;

function handler(req, res) {
	fs.readFile("client.html", function(err, data) {
		if (err) {
			res.writeHead(500);
            res.end("Error loading client.html");
		}
		else {
            res.writeHead(200);
            res.end(data);
        }
	});
};

app.listen(port, function() {
	console.log("Running on port: " + port);
});

