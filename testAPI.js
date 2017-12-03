alert("testAPI.js")

//https://api.themoviedb.org/3/person/{person_id}?api_key=<<api_key>>&language=en-US
//data.popularity
var rating = 0;

var person = document.getElementById('actorActress').innerText;
alert("js:" +document.getElementById('actorActress').innerText);
alert("var: " +person);
//var producerName = document.getElementById('producerName').innerText;
//Quentin+Tarantino
//henry+cavill
// $.ajax({
//     type: "GET",
//     url: "https://api.themoviedb.org/3/search/person?api_key=" + movieapi + "&query=" + producerName,
//     dataType: "json",
//     async: false,
//     data: {},
//     success: function(data, status) {
//         directorpopularity = data.results[0].popularity;
//     },
//     complete: function(data, status) { //optional, used for debugging purposes
//         //alert(data);
//     }
// }); //AJAX
    alert('pre ajax');
$.ajax({
    type: "GET",
    url: "https://api.themoviedb.org/3/search/person",
    //    url: "https://api.themoviedb.org/3/search/person?api_key=540de088224c98930553e46419dbf3fb&query='George Lucas",
    async: false,
    dataType: "json",//or jsonp
    data: { "api_key" : getData(),//"540de088224c98930553e46419dbf3fb",
            "query": person,
            //"query": "george lucas",
    },
    success: function(data, status) {
        alert('success');
        if(!data)
            alert("nope");
        else
        alert(data.results[0]);
        rating = data.results[0].popularity;
    },
    complete: function(data, status) { //optional, used for debugging purposes
        alert('status: ' + status);
    }
}); //AJAX


//what is popularity out of --> for now saying out of 40
//alert("Director: " + directorpopularity + "Actor: " + actorpopularity)

//insert into id="percentage"
//((directorpopularity+actorpopularity)/80) * 100
document.getElementById('percentage').innerHTML = rating;/// SEMICOLON HELL!!!!

