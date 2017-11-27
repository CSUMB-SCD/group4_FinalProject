var express = require('express');
var router = express.Router();
const app = module.exports = express();
const mysql = require('mysql');

let output;

app.use( express.logger() );

const connection = mysql.createConnection({
  host     : process.env.hKey,
  user     : process.env.uKey,
  password : process.env.pwKey,
  database : process.env.dbKey
});

app.get('/', function( request, response ){
    connection.query('SELECT * FROM admin', function (error, results, fields) {
        if (error){
            console.log('Error: ', error);
            throw error;
        }
       //response.send(['hello!!!!', results]);
       output = ['hello!!!!', results];
    });
});

/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('index', { title: ' - Movie Insight - ', para: 'Group Four Final Project', sqldata: output });
});

module.exports = router;