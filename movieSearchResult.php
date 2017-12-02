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
    $_SESSION['movieTitle'] = $_GET['movieTitle'];
    $_SESSION['movieDate'] = $_GET['movieDate'];
    $_SESSION['producersName'] = $_GET['producersName'];
    $_SESSION['actorActress'] = $_GET['actorActress'];
    
    function listMovieDetails(){
        echo "<em><strong>Movie Title: </strong></em>".$_SESSION['movieTitle']."<br>";
        echo "<em><strong>Movie Date: </strong></em>".$_SESSION['movieDate']."<br>";
        echo "<em><strong>Producer: </strong></em><span id='producerName'>".$_SESSION['producersName']."</span><br>";
        echo "<em><strong>Actor/Actress: </strong></em><span id='actorActress'>".$_SESSION['actorActress']."</span><br>";
    }
?>

<!DOCTYPE html>
<html>
    <meta charset='utf-8'/>
    <head>
        <title>Movie Search Results</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
                    <script type="text/javascript" src="testAPI.js"></script>
                </div>
            </div>
        </div>
        <?php
        include 'inc/footer.php';
        ?>
        <script>document.getElementById('welcome').innerHTML += '<?php echo $_SESSION["name"] ?>' </script>
    </body>
</html>