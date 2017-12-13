//https://api.themoviedb.org/3/person/{person_id}?api_key=<<api_key>>&language=en-US
//xml tree branch - data.popularity

//PLEASE DO NOT CHANGE UNLESS IT WORKS

var a = "540de08";
var b = "8224c98";
var c = "930553e";
var d = "46419db";
var last = "f3fb";
var myAPI = a+b+c+d+last;

var person = "";
var count = 0;
var rating ="";
var ratingSum = 0;

$('span').each(function () {
    person = $(this).text();
    if( person !== ''){
         getData(person);
         count++;
    }
})  
function getData(person){
//alert('person: '+person);
    $.ajax({
        type: "GET",
        url: "https://api.themoviedb.org/3/search/person",
        async: false,
        dataType: "json",//or jsonp
        data: { "api_key" : myAPI,
                "query": person,
        },
        success: function(data, status) {
//alert('success');
            if(!data){
//alert('nodata'); 
                rating += 0 + '<br>';
            }else{
                rating += data.results[0].popularity +'<br>';
//alert('rating '+rating);
            }
                ratingSum += data.results[0].popularity;
//alert('ratingSum '+ ratingSum);
            
        },
        complete: function(data, status) { //optional, used for debugging purposes
        }
    }); //END AJAX
}
ratingSum = Math.round( (ratingSum/(20*count))*10000)/100;

document.getElementById('individRating').innerHTML = rating;
document.getElementById('overall').innerHTML = ratingSum;

if(ratingSum > 100)
    document.getElementById("overall").style.color = "#000080";
else if(ratingSum > 60)
    document.getElementById("overall").style.color = "#006400";
else
    document.getElementById("overall").style.color = "#f00";
    
//PLEASE DO NOT CHANGE UNLESS IT WORKS