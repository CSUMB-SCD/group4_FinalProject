<?php
    session_start();  //start or resume an existing session
    
    include 'inc/dbConnection.php';
    include 'php/source.php';
     
    $dbConn = getDBConnection(); 
     
    if(!isset($_SESSION["user"])) {  //Check whether the admin has logged in
        $_SESSION["name"] = "Guest";
        //alert("user is not logged in");
    }

    if(isset($_POST['logout'])){
        //$_SESSION =[];
        session_destroy();
        header("Location: index.php");
        //alert("logged out");
    }
    
    if(isset($_POST['login'])){
        //echo "goMain <br>";
        goMain();
    }
?>

<!DOCTYPE html>
<html>
    <meta charset='utf-8'/>
    <head>
        <title>Movie Search</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
        <script src='js/validateSearch.js'></script>
    </head>
    <body>
        <?php include 'inc/header.php';
        include 'inc/nav.php';
        ?>
        <div class= "wrapper">
            <h4 id="welcome">Welcome </h4>
            <div id="id02" class="">
                <form method="GET" id="submitforum" action="movieSearchResult.php" onsubmit="return validateForm()">
                    Movie Title:<input type="text" name="movieTitle" id="movieTitle"/><br/>
                    <span id="errormovieTitle"></span>
                    Date:<input type="date" name="movieDate" id="movieDate"/><br/>
                    <span id="errormovieDate"></span>
                    Producers Name:<input type="text" name="producersName" id="producersName"/><br/>
                    <span id="errorproducersName"></span>
                    actor/actress:<input type="text" name="actorActress" id="actorActress"/><br/>
                    <span id="erroractorActress"></span>
                    <input type="submit" value="Submit"/>
                </form>
            </div>    
        </div>
        <?php
        include 'inc/footer.php';
        ?>
        <script>document.getElementById('welcome').innerHTML += '<?php echo $_SESSION["name"] ?>' </script>
    </body>
</html>