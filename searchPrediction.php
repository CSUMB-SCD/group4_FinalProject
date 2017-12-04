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
    
    function fakeTable(){
        echo"
        <tr>
            <td>Fake Movie 1 </td>
            <td>90% </td>
          </tr>
          <tr>
            <td>Fake Movie 2 </td>
            <td>75% </td>
          </tr>
          <tr>
            <td>Fake Movie 3</td>
            <td>69% </td>
          </tr>
          <tr>
            <td>Fake Movie 4 </td>
            <td>21% </td>
          </tr>
          <tr>
            <td>Fake Movie 5</td>
            <td>99% </td>
          </tr>
          <tr>
            <td>Fake Movie 6 </td>
            <td>82% </td>
          </tr>";
    }
?>

<!DOCTYPE html>
<html>
    <meta charset='utf-8'/>
    <head>
        <title>Search Prediction</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        
        <style>
            input[type=text] {
                width: 130px;
                border: 2px solid #808080;
                border-radius: 4px;
                font-size: 16px;
                background-color: white;
                padding: 10px 15px 10px 25px;
                transition: width 0.4s ease-in-out;
            }
            
            input[type=text]:focus {
                width: 100%;
            }
            
        </style>
    </head>
    <body>
        
        <?php 
        include 'inc/header.php';
        include 'inc/nav.php';
        ?>
         <div class= "wrapper">
             
            <h4 id="welcome">Welcome </h4>
            
            <div>
                <iframe src="https://hw5-group4-chatapp.herokuapp.com/" height="500px" width="50%" align="right"></iframe>
            </div>
            
            <div style="float:left; width: 45%;">
                <form>
                    <input type="text" name="search" placeholder="Search..">
                </form> <br>
                
                <table id="predictions" style="width: 100%;">
                    <tr>
                        <th>Movie Title</th>
                        <th>Prediction </th>
                    </tr>
                    <?php  fakeTable(); ?>
                </table>
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