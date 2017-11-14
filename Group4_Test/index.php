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
        <!--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">-->
        
         <!--Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
         <!--Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="css/styles.css">
        
        <script src='js/jsValidReg.js'></script>
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
                            <input type="text" placeholder="Enter Username" name="username" required class="ittAD">
                            
                            <label><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="password" required class="itpAD">
                            
                            <input type="submit" name ="login" value="Login" class="btnAD btn sub" />
                        </form>
                    <td>
                        <form method="POST" name="register" onsubmit="return validateForm()">
                            <label><b>Username</b></label>
                            <input type="text" placeholder="Enter Username" id="username" required class="ittAD" onchange = "checkUsername()">
                            <span id="usernameError"></span>
                            
                            <label><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" id="pw" required class="itpAD">
                            <span id="passwordError"></span>
                            
                            <label><b>Retype Password</b></label>
                            <input type="password" placeholder="Retype Password" id="pwAgain" required class="itpAD">
                            <span id="pwAgainError"></span>
                            
                            <label><b>Name</b></label>
                            <input type="text" placeholder="Your name" id="name" required class="ittAD">
                            
                            <label><b>Email</b></label>
                            <input type="text" placeholder="example@google.com" id="email" required class="ittAD">
                            <span id="emailError"></span>
                            
                            <input type="submit" id ="register" value="Register" class="btnAD btn sub" />
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