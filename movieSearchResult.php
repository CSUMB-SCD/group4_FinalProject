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
        <title>Movie Search Results</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
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
                            <th>Movie Details</th>
                            <th>Result</th>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td>percentage%</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <?php
        include 'inc/footer.php';
        ?>
        <script>document.getElementById('welcome').innerHTML += '<?php echo $_SESSION["name"] ?>' </script>
    </body>
</html>