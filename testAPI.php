
<!DOCTYPE html>
<html>
    <meta charset='utf-8'/>
    <head>
        <title>Testing</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
         <!--Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
         <!--Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="css/styles.css">
        <!-- jQuery dependent!!! -->
        <script src='js/jsValidReg.js'></script>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
    </head>
    <body>
                <script>
                    //https://api.themoviedb.org/3/person/{person_id}?api_key=<<api_key>>&language=en-US
                    //data.popularity
                    var directorpopularity = 0;
                    var actorpopularity = 0;
                    var movieapi = "<insert api key>";
                    $.ajax({
                        type: "GET",
                        url: "https://api.themoviedb.org/3/search/person?api_key="+movieapi+"&query=Quentin+Tarantino", 
                        dataType: "json",
                        async: false,
                        data: {}, 
                        success: function(data,status) {
                            directorpopularity = data.results[0].popularity;
                          },
                          complete: function(data,status) { //optional, used for debugging purposes
                            //alert(data);
                          }
                    }); //AJAX
                    $.ajax({
                        type: "GET",
                        url: "https://api.themoviedb.org/3/search/person?api_key="+movieapi+"&query=henry+cavill", 
                        dataType: "json",
                        async: false,
                        data: {}, 
                        success: function(data,status) {
                            actorpopularity = data.results[0].popularity;
                          },
                          complete: function(data,status) { //optional, used for debugging purposes
                            //alert(data);
                          }
                    }); //AJAX
                    
                    alert("Director: " + directorpopularity + "Actor: " + actorpopularity)
                	
                </script>

    </body>
</html>