var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('movieSearch', { title: 'Movie Insight - Movie Search', para: 'user1234' });
});

module.exports = router;
