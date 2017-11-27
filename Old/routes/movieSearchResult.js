var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('movieSearchResult', { title: 'Movie Insight - Movie Search Result', para: 'user1234' });
});

module.exports = router;
