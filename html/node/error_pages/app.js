var express = require('express');
var path = require('path');
var favicon = require('serve-favicon');
var logger = require('morgan');
var cookieParser = require('cookie-parser');
var bodyParser = require('body-parser');

var index = require('./routes/index');
var users = require('./routes/users');

var app = express();

// view engine setup
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');
app.set('port', process.env.PORT || 8081);

// uncomment after placing your favicon in /public
//app.use(favicon(path.join(__dirname, 'public', 'favicon.ico')));
app.listen(app.get('port'));
app.use(logger('dev'));
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, 'public')));

//error info  array
var statusCodes = {"400":"Bad Request",
		   "401":"Unauthorized",
		   "403":"Forbidden",
		   "404":"Not Found",
		   "405":"Method Not Allowed",
		   "406":"Not Acceptable",
		   "407":"Proxy Authentication Required",
		   "408":"Request Timeout",
		   "409":"Conflict",
		   "410":"Gone",
                     //        "411" => "Length Required",
                   //          "412" => "Precondition Failed",
                 //            "413" => "Payload Too Large",
               //              "414" => "URI Too Long",
             //                "415" => "Unsupported Media Type",
           //                  "416" => "Requested Range Not Satisfiable",
         //                    "417" => "Expectation Failed",
		   "421":"Misdirected Request",
		   "422":"Unprocessable Entity",
		   "423":"Locked",
		   "424":"Failed Dependency",
		   "426":"Upgrade Required",
		   "428":"Precondition Required",
		   "429":"Too Many Requests",
		   "431":"Request Header Fields Too Large",
		   "500": "Internal Server Error",
       //                      "501" => "Not Implemented",
     //                        "502" => "Bad Gateway",
   //                          "503" => "Service Unavailable",
 //                            "504" => "Gateway Timeout",
//                             "505" => "HTTP Version Not Supported",
		   "506":"Variant Also Negotiates",
		   "507":"Insufficient Storage",
		   "508":"Loop Detected",
		   "510":"Not Extended",
		   "511":"Network Authentication Required"};
// Handle 404
app.use(function(req, res) {
	res.status(404);
	res.render('errors/400.jade', {errorMessage: statusCodes["404"], errorNo: 404});
});
  
// Handle 500
app.use(function(error, req, res, next) {
	res.status(500);
	res.render('errors/500.jade', {title:'500: Internal Server Error', error: error});
});

app.use('/', index);
app.use('/users', users);

// catch 404 and forward to error handler
app.use(function(req, res, next) {
  var err = new Error('Not Found');
  err.status = 404;
  next(err);
});

// error handler
app.use(function(err, req, res, next) {
  // set locals, only providing error in development
  res.locals.message = err.message;
  res.locals.error = req.app.get('env') === 'development' ? err : {};

  // render the error page
  res.status(err.status || 500);
  res.render('error');
});

module.exports = app;
