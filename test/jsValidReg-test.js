var expect = require("chai").expect;
var displayError = require("../js/jsValidReg.js").displayError;
var checkUserName = require("../js/jsValidReg.js").checkUserName;
var checkEmail = require("../js/jsValidReg.js").checkEmail;
var checkRetype = require("../js/jsValidReg.js").checkRetype;
var checkPassword = require("../js/jsValidReg.js").checkPassword
var validateForm = require("../js/jsValidReg.js").validateForm;
var jsdom = require('jsdom');
var document = jsdom.jsdom("html");
var window = document.defaultView;
global.$ = require('jquery')(window);


//console.log(add.add(3,4));

describe("Error Message", function($) {
    it("should print error message", function(done){
        expect(displayError("#email","error message")).to.equal('error message');
        done();
    });
});
describe("Check Username", function($) {
    it("Should return true", function(done){
        expect(checkUserName()).to.be.true;
        done();
    });
});
describe("Check Email", function($) {
    it("Should return true", function(done){
        expect(checkEmail()).to.be.true;
        done();
    });
});
describe("Check Retype", function($) {
    it("Should return true", function(done){
        expect(checkRetype()).to.be.true;
        done();
    });
});
describe("Check Password", function($) {
    it("Should return true", function(done){
        expect(checkPassword()).to.be.true;
        done();
    });
});
describe("Valid Form", function($) {
    it("Should return true", function(done){
        expect(validateForm()).to.be.true;
        done();
    });
});