<?php
    session_start();  //start or resume an existing session
    
    include 'inc/dbConnection.php';
    include 'php/source.php';
     
    $dbConn = getDBConnection(); 
     
    if(!isset($_SESSION["user"])) {  //Check whether the user has logged in
        $_SESSION["name"] = "Guest";
    }

    if(isset($_POST['logout'])){
        //$_SESSION =[];
        session_destroy();
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html>
    <meta charset='utf-8'/>
    <head>
        <title>Index</title>
<!--Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <?php   include 'inc/header.php';
                include 'inc/nav.php';    ?>
        <div class= "wrapper">
            <h4 id="welcome">Welcome </h4>
                <table>
                    <tr>
                    <td class = "tdIndex">
                        <form method="POST" class="" name="loginForm">
                            <?php if( !isset($_SESSION["user"]) ){
                                    echo '<label><b>Username</b></label>';
                                    echo '<input type="text" placeholder="Enter Username" name="username" required class="ittAD">';
                                    echo '<label><b>Password</b></label>';
                                    echo '<input type="password" placeholder="Enter Password" name="password" required class="itpAD">';
                                    echo '<input type="submit" name ="login" value="Login" class="btnAD btn sub" />';
                                  }else{
                                      echo '<img src="img/ticket.png" alt="A pair of generic movie theatre tickets." height="325" width="392">';
                                      echo '<em><h1>Enjoy</h1></em>';
                                      echo "<a href='profile.php'><div class='btnAD btn'>Profile</div></a>";
                                  }
                                if(isset($_POST['login'])){
                                    goMain();
                                }
                            ?>
                        </form>
                    <td class = "tdIndex">
                        <form method="POST" name="register" action="#" onsubmit="return validateForm()">
                            <label><b>Username</b></label> <span id="usernameError"></span>
                            <input type="text" name='usernameReg' placeholder="Enter Username" id="username" required class="ittAD" onchange = "checkUserName()">
                           
                            <label><b>Password</b></label><span id="pwError"></span>
                            <input type="password" name= 'pwReg' placeholder="Enter Password" id="pw" required class="itpAD">
                            
                            <label><b>Retype Password</b></label><span id="pwAgainError"></span>
                            <input type="password" placeholder="Retype Password" id="pwAgain" required class="itpAD">
                            
                            <label><b>Name</b></label>
                            <input type="text" name= 'nameReg' placeholder="Your name" id="name" required class="ittAD">
                            
                            <label><b>Email</b></label><span id="emailError"></span>
                            <input type="text" name= 'emailReg' placeholder="example@google.com" id="email" required class="ittAD">
                            
                            <input type="submit" name= 'reg' id ="register" value="Register" class="btnAD btn sub" />
                            <?php
                                if(isset($_POST['reg'])){// && !isset($_SESSION["user"]) ){
                                    addUser();
                                    echo "<h3 id='addUser'>Register Complete.</h3>";
                                }
                            ?>
                        </form>
                    </td>
                    </tr>
                </table>
        </div>
        <?php   include 'inc/footer.php';    ?>
<!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- jQuery dependent!!! -->
        <script src='js/jsValidReg.js'></script>
        <script>document.getElementById('welcome').innerHTML += '<?php echo $_SESSION["name"] ?>' </script>
    </body>
</html>