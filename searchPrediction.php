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
    <style>
        /*div{ border: 5px solid red;}*/
        .pokemon1 {
            width: 100% !important;
        }
    </style>
    <head>
        <title>Search Prediction</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        
        <?php 
        include 'inc/header.php';
        include 'inc/nav.php';
        ?>
         <div class= "wrapper pokemon1">
            <h4 id="welcome">Welcome </h4>
            <div>
                <div>
                    <iframe class="pokemon3" src="https://hw5-group4-chatapp.herokuapp.com/" height="500px" width="50%" align="right"></iframe>
                </div>
            </div>    
        </div>
    
    </body>
    <footer>
        <?php
        include 'inc/footer.php';
        ?>
        <script>document.getElementById('welcome').innerHTML += '<?php echo $_SESSION["name"] ?>' </script>
    </footer>
    
</html>