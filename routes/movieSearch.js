var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('movieSearch', { title: 'Movie Search', para: 'Movie Search Website' });
});

module.exports = router;
