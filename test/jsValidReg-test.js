var expect = require("chai").expect;
var displayError = require("../js/jsValidReg.js").displayError;
var jsdom = require('jsdom');
var document = jsdom.jsdom("");
var window = document.defaultView;
global.$ = require('jquery')(window);

//console.log(add.add(3,4));

describe("Error Message", function($) {
   it("should print error message", function(done){
       expect(displayError("#email","error message")).to.not.be.empty;
       done();
   });
});