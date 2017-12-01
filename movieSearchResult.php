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
    $GLOBALS['movieTitle'] = $_GET['movieTitle'];
    $GLOBALS['movieDate'] = $_GET['movieDate'];
    $GLOBALS['producersName'] = $_GET['producersName'];
    $GLOBALS['actorActress'] = $_GET['actorActress'];
    
    function listMovieDetails(){
        echo "<em><strong>Movie Title: </strong></em>".$GLOBALS['movieTitle']."<br>";
        echo "<em><strong>Movie Date: </strong></em>".$GLOBALS['movieDate']."<br>";
        echo "<em><strong>Producer: </strong></em><span id='producerName'>".$GLOBALS['producersName']."</span><br>";
        echo "<em><strong>Actor/Actress: </strong></em><span id='actorActress'>".$GLOBALS['actorActress']."</span><br>";
    }
?>

<!DOCTYPE html>
<html>
    <meta charset='utf-8'/>
    <head>
        <title>Movie Search Results</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
        include 'inc/header.php';
        include 'inc/nav.php';
        ?>
        <div class= "wrapper" style="width: 50% !important">
            <h4 id="welcome">Welcome </h4>
            <div id="id02" class="">
                <h1 class="title">Movie Search Results</h1>
                <div class="containerAD">
                    <table>
                        <tr>
                            <td class="resultsBox"><?php  listMovieDetails() ?></td>
                            <td class="resultsBox"><em><strong>Percentage: </strong></em><span id="percentage"></span>%</td>
                        </tr>
                    </table>
                    <script type="text/javascript" src="moviepreditions.js"></script>
                </div>
            </div>
        </div>
        <?php
        include 'inc/footer.php';
        ?>
        <script>document.getElementById('welcome').innerHTML += '<?php echo $_SESSION["name"] ?>' </script>
    </body>
</html>