var expect = require("chai").expect;
var add = require("../sample-function").add;

//console.log(add.add(3,4));

describe("Add function", function() {
   it("should return sum of 2 numbers", function(done){
       expect(add(2,4)).to.equal(6);
       //expect(add(2,4)).to.equal(3);
       done();
   });
});