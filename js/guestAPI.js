//https://api.themoviedb.org/3/person/{person_id}?api_key=<<api_key>>&language=en-US
//data.popularity

//var rating = 0;//numerical
var rating ="";//literal
var person = "";
var count = 0;
var ratingSum = 0;


//var myAPI = process.env.SOME_VAR;
//could store these in a database and call the db.
var a = "540de08";
var b = "8224c98";
var c = "930553e";
var d = "46419db";
var last = "f3fb";
var myAPI = a+b+c+d+last;

$('span').each(function () {
    person = $(this).text();
    if( person !== ''){
         getData(person);
         count++;
    }
})  


//document.getElementById('percentage').innerHTML += (rating/count) *1.25;
//alert(rating);
//alert(ratingSum);
document.getElementById('individRating').innerHTML = rating;
ratingSum = Math.round((ratingSum/20*count)*5);
if(ratingSum > 100)
{
    document.getElementById('overall').innerHTML = "BLOCK BUSTERRRRRR!!";
    document.getElementById("overall").style.color = "#000080";
}
else if(ratingSum > 60)
{
    document.getElementById('overall').innerHTML = ratingSum;
    document.getElementById("overall").style.color = "#006400";
}
else
{
    document.getElementById('overall').innerHTML = ratingSum;
    document.getElementById("overall").style.color = "#f00";
}
addPrediction();
function getData(person){
    $.ajax({
        type: "GET",
        url: "https://api.themoviedb.org/3/search/person",
        async: false,
        dataType: "json",//or jsonp
        data: { "api_key" : myAPI ,
                "query": person,
        },
        success: function(data, status) {
            if(!data)
                //rating += 0;
                rating += 0 + '<br>';
            else
                //rating += data.results[0].popularity;
                rating += data.results[0].popularity +'<br>';
                ratingSum += data.results[0].popularity
        },
        complete: function(data, status) { //optional, used for debugging purposes
        }
    }); //END AJAX
}