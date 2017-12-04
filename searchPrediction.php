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
        <title>Search Prediction</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <?php include 'inc/header.php';
        include 'inc/nav.php';
        ?>
        <div class= "wrapper">
            <h4 id="welcome">Welcome </h4>
            <div id="id02" class="">
                <div class="containerAD">
                    <iframe src="https://hw5-group4-chatapp.herokuapp.com/" height="600px" width="100%"></iframe>
            
                </div>
            </div>    
        </div>
        <?php   include 'inc/footer.php';    ?>
        <script>document.getElementById('welcome').innerHTML += '<?php echo $_SESSION["name"] ?>' </script>
    </body>
</html>