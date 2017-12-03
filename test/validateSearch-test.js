var expect = require("chai").expect;
var checkmovieTitle = require("../js/validateSearch.js").checkmovieTitle;
//var checkmovieDate = require("../js/validateSearch.js").checkmovieDate;
//var checkproducersName = require("../js/validateSearch.js").checkproducersName;
//var checkactorActress = require("../js/validateSearch.js").checkactorActress;


describe("Movie Title", function() {
   it("should return true", function(done){
       document.getElementById("movieTitle").value = "title";
       expect(checkmovieTitle()).to.be.true;
       done();
   });
   it("should return false", function(done){
       document.getElementById("movieTitle").value = "";
       expect(checkmovieTitle()).to.be.false;
       done();
   });
});