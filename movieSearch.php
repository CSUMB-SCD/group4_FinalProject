<?php
    session_start();  //start or resume an existing session
    
    include 'inc/dbConnection.php';
    include 'php/source.php';
     
    $dbConn = getDBConnection(); 
     
    if(!isset($_SESSION["user"])) {  //Check whether the admin has logged in
        $_SESSION["name"] = "Guest";
    }
    if(isset($_POST['logout'])){
        session_destroy();
        header("Location: index.php");
    }
    
    if(isset($_POST['login'])){
        goMain();
    }
?>

<!doctype html>
<html lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <head>
        <title>Movie Search</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <style>
            #filmImg{
                float: right;
                width:50%;
            }
           
        </style>
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
                        </td>
                        <td rowspan = '5'>
                        <img src="img/film.png" alt="Strip of film" height="339" width="378" /> 
                        </td></tr>
                        <tr><td class = "tdIndex">
                        Director Name: <br/> <input type="text" name="director" placeholder="George Lucas" size="40"/>
                        </td></tr> <tr><td class = "tdIndex">
                        Actor/Actress: <br/><input type="text" name="actorOne" placeholder=" Scarlett Johansson"size="40"/>
                        </td></tr><tr><td class = "tdIndex">
                        Actor/Actress: <br/><input type="text" name="actorTwo" placeholder="Harrison Ford"size="40"/>
                        </td></tr>
                        <tr><td class = "tdIndex">
                        Date: <br/><input type="date" name="movieDate" required/>
                        </td></tr> <tr><td class = "tdIndex">
                        <input type="submit" value="Submit" class="btnAD btn sub"/>
                        </td></tr>
                    </table>
                </form>
        </div>
        <?php   
            include 'inc/footer.php';
            $_SESSION['peeps'] = 0;
        ?>
        <script>document.getElementById('welcome').innerHTML += '<?php echo $_SESSION["name"] ?>' 
        </script>
    </body>
</html>