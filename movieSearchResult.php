<?php
    session_start();  //start or resume an existing session
    
    include 'inc/dbConnection.php';
    include 'php/source.php';
    include 'php/movieSearchSource.php';
     
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
        <title>Movie Search Results</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    </head>
    <body>
        <?php   
            include 'inc/header.php';
            include 'inc/nav.php';
        ?>
        <div class= "wrapper" style="width: 50% !important">
            <h4 id="welcome">Welcome </h4>
                <h1 class="title">Movie Search Results</h1>
                <div class="containerAD">
                    <table>
                        <tr>
                            <td class="resultsBox">
                                <em><strong>Movie Title: </strong></em><?php echo $_POST['movieTitle']; ?>
                                    <br><em><strong>Director: </strong></em><span id='directorName'><?php echo $_POST['director']; ?></span>
                                    <br><em><strong>Actor/Actress: </strong></em><span id='actorActress'><?php echo $_POST['actorOne']; ?></span>
                                    <br><em><strong>Actor/Actress: </strong></em><span id='actorActress'><?php echo $_POST['actorTwo']; ?></span>
                                <br><em><strong>Movie Date: </strong></em><?php echo $_POST['movieDate']; ?>
                            </td>
                            <td class="resultsBox" id="percentage"><em><strong>Percentage:<br></strong></em></td>
                        </tr>
                    </table>
                </div>
        </div>
        <?php
        include 'inc/footer.php';
        ?>
        <script>document.getElementById('welcome').innerHTML += '<?php echo $_SESSION["name"] ?>' </script>
<!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="testAPI.js"></script>
        <?php //print_r($_POST); // could use  foreach....still need if() to check director vs actor...
            if( $_POST['director'] != ''){
                addMoviePerson($_POST['director'], 1);
            }
            if( $_POST['actorOne'] != ''){
                addMoviePerson($_POST['actorOne'], 2);
            }
            if( $_POST['actorTwo'] != ''){
                addMoviePerson($_POST['actorTwo'], 2);
            }
            if( $_POST['movieTitle'] !=""){
                addMovieSearch($_POST['movieTitle'],$_POST['movieDate'] );
            }
        ?>
    </body>
</html>