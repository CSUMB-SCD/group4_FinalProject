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
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <?php include 'inc/header.php';
        include 'inc/nav.php';
        ?>
        <div class= "wrapper">
            <h4 id="welcome">Welcome </h4>
            
                <form method="POST" name="movieSearch" action="movieSearchResult.php" >
                    <table>
                        <tr><td class = "tdIndex">
                        Movie Title: <br/><input type="text" name="movieTitle" placeholder="Stranger Things" size="40"/>
                        </td></tr> 
                            <tr><td class = "tdIndex">
                            Producers Name: <br/> <input type="text" name="producer" placeholder="George Lucas" size="40"/>
                            </td></tr> <tr><td class = "tdIndex">
                            Actor/Actress: <br/><input type="text" name="actorOne" placeholder=" Scarlett Johansson"size="40"/>
                            </td></tr><tr><td class = "tdIndex">
                            Actor/Actress: <br/><input type="text" name="actorTwo" placeholder="Harrison Ford"size="40"/>
                            </td></tr>
                         <tr><td class = "tdIndex">
                           Date: <br/><input type="date" name="movieDate"/>
                         </td></tr> <tr><td class = "tdIndex">
                        <input type="submit" value="Submit" class="btnAD btn sub"/>
                        </td></tr>
                    </table>
                </form>
             
        </div>
        <?php   include 'inc/footer.php';    ?>
        <script>document.getElementById('welcome').innerHTML += '<?php echo $_SESSION["name"] ?>' 
        </script>
    </body>
</html>