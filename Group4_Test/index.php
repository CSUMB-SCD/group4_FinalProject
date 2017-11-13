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
    
    if(isset($_POST['register'])){
        
    }
?>

<!DOCTYPE html>
<html>
    <meta charset='utf-8'/>
    <head>
        <title>Index</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <?php
          include 'inc/header.php';
          include 'inc/nav.php';
        ?>
        
        <div class= "wrapper">
            <h4 id="welcome">Welcome </h4>
            <div class="containerAD">
                <table>
                    <tr>
                    <td>
                        <form method="POST" class="" name="loginForm">
                            <label><b>Username</b></label>
                            <input type="text" placeholder="Enter Username" name="username" required id="ittAD">
                            
                            <label><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="password" required id="itpAD">
                            
                            <input type="submit" name ="login" value="Login" class="btnAD btn sub" />
                        </form>
                    <td>
                        <form method="POST" class="" name="registerForm">
                            <label><b>Username</b></label>
                            <input type="text" placeholder="Enter Username" name="username" required id="ittAD">
                            
                            <label><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="password1" required id="itpAD">
                            
                            <label><b>Retype Password</b></label>
                            <input type="password" placeholder="Retype Password" name="password2" required id="itpAD">
                            
                            <label><b>Name</b></label>
                            <input type="text" placeholder="Enter Name" name="name" required id="ittAD">
                            
                            <label><b>eMail</b></label>
                            <input type="text" placeholder="Enter eMail" name="email" required id="ittAD">
                            
                            <input type="submit" name ="register" value="Register" class="btnAD btn sub" />
                        </form>
                    </td>
                    </tr>
                </table>
            </div> 
        </div>
        <?php
            include 'inc/footer.php';
        ?>
         <script>document.getElementById('welcome').innerHTML += '<?php echo $_SESSION["name"] ?>' </script>
  </body>
</html>