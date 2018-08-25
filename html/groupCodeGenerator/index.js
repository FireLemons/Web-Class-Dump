const admin = require('firebase-admin');
const express = require('express');
const fs = require('fs');
const path = require('path');
const http = require('http');
const https = require('https');
const app = express();

var serviceAccount = require("/var/www/html/groupCodeGenerator/credentials.json");

admin.initializeApp({
  credential: admin.credential.cert(serviceAccount),
  databaseURL: "https://database-32cc5.firebaseio.com"
});

app.get('/ping-test', (req, res) => res.sendStatus(200));
app.get('/', function(req, res){
	res.end('');
});

app.use('/reminder', express.static(path.join(__dirname + '/reminderGenerator')));

app.listen(80);
