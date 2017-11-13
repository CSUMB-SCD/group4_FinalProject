<?php
    session_start();  //start or resume an existing session
    
    include 'inc/dbConnection.php';
    include 'php/source.php';
     
    $dbConn = getDBConnection(); 
     
    if(!isset($_SESSION["user"])) {  //Check whether the admin has logged in
        $_SESSION["name"] = "Guest";
        //alert("user is not logged in");
        
    }else{
      
      
    }

    if(isset($_POST['logout'])){
        //$_SESSION =[];
        session_destroy();
        header("Location: index.php");
        //alert("logged out");
    }
    
    if(isset($_POST['login'])){
        echo "goMain <br>";
        goMain();
    }
    
    if(isset($_POST['register'])){
        echo "goMain <br>";
        goMain();
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
   
        <header id="title">~ Movie Insight ~
        <?php
            if(isset($_SESSION['user'])){
            echo '<form method ="POST" id="logoutBtn" >';
            echo  '<input type="submit" value="Logout" class="btnAD btn" name="logout"/>';
            echo '</form>';
            }
        ?>
        </header>
        
        <?php
          include 'inc/nav.php';
        ?>
        <div class= "wrapper" style="width: 50% !important">
        <h4 id="welcome">Welcome </h4>
        <div id="id02" class="">
          <div class="containerAD">
          <table width="100%">
            <tr>
                <td>
          <form method="POST" class="" name="loginForm">
    
            
              <label><b>Username</b></label>
              <input type="text" placeholder="Enter Username" name="username" required id="ittAD">
        
              <label><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="password" required id="itpAD">
                
              <input type="submit" name ="login" value="Login" class="btnAD btn sub" />
            
            </div>
        
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
          </td>
          </tr>
        </div> 
        </table>
        </div>
    <?php
        include 'inc/footer.php';
    ?>
     <script>document.getElementById('welcome').innerHTML += '<?php echo $_SESSION["name"] ?>' </script>
  </body>
</html>