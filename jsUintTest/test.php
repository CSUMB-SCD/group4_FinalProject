<!--https://jasmine.github.io/2.8/introduction
These CDN's import the jasmine-standalone.
https://www.youtube.com/watch?v=dFz2h7o0vqs

Copy/Paste this page into JS Bin. It will avoid php and cloud9 dependancies or 
extract the standalone and run test from the local machine-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Jasmine unit testing</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jasmine/2.6.1/jasmine.css"></link>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jasmine/2.6.1/jasmine.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jasmine/2.6.1/jasmine-html.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jasmine/2.6.1/boot.js"></script>
    
    <script>
    
    describe("my first js unit test", function() {
      var a;
      it("testing function intent", function() {
        a = true;
        expect(a).toBe(true);
      });
    });
    
    var Calc = function(){
        return{
            add: function(a,b){
                return a+b;
            },
            sub: function( a,b ){
                return a-b;
            },
            mult: function(a,b){
                return a*b;
            },
            div: function(a,b){
                return a/b;
            }
        }
    }
    
    describe('calc suite', function(){
       var calc = new Calc();
       it('should add two numbers together', function(){
           expect( calc.add(5,5)).toBe(10);
       });
       it('should sub two numbers together', function(){
           expect( calc.sub(5,5)).toBe(0);
       });
       it('should mult two numbers together', function(){
           expect( calc.mult(5,5)).toBe(25);
       });
       it('should div two numbers together', function(){
           expect( calc.div(5,5)).toBe(1);
       });
    });
    </script> 
    
</head>
<body></body>
</html>