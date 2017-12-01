//https://api.themoviedb.org/3/person/{person_id}?api_key=<<api_key>>&language=en-US
//data.popularity
var directorpopularity = 0;
var actorpopularity = 0;
var movieapi = "<insert api key>";
var actorActress = document.getElementById('actorActress').innerText;
var producerName = document.getElementById('producerName').innerText;
//Quentin+Tarantino
//henry+cavill
$.ajax({
    type: "GET",
    url: "https://api.themoviedb.org/3/search/person?api_key=" + movieapi + "&query=" + producerName,
    dataType: "json",
    async: false,
    data: {},
    success: function(data, status) {
        directorpopularity = data.results[0].popularity;
    },
    complete: function(data, status) { //optional, used for debugging purposes
        //alert(data);
    }
}); //AJAX
$.ajax({
    type: "GET",
    url: "https://api.themoviedb.org/3/search/person?api_key=" + movieapi + "&query=" + actorActress,
    dataType: "json",
    async: false,
    data: {},
    success: function(data, status) {
        actorpopularity = data.results[0].popularity;
    },
    complete: function(data, status) { //optional, used for debugging purposes
        //alert(data);
    }
}); //AJAX


//what is popularity out of --> for now saying out of 40
alert("Director: " + directorpopularity + "Actor: " + actorpopularity)

//insert into id="percentage"
//((directorpopularity+actorpopularity)/80) * 100
document.getElementById('percentage').innerHTML = ((directorpopularity+actorpopularity)/80) * 100;