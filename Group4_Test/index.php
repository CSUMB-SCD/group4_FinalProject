<?php
    session_start();  //start or resume an existing session
    
    if (!isset($_SESSION["user"])) {  //Check whether the admin has logged in
    $_SESSION["name"] = "Guest";
    }
// }else{
//     header("Location:index.php");
// }
    include 'inc/dbConnection.php';
    include 'php/source.php';
    
  $dbConn = getDBConnection(getenv("dKey"));

  if(isset($_POST['logout'])){
      session_destroy();
      $_SESSION = [];
      //header("Location: indexFinal.php");
      //reset values
      
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
    <div class="row">
      <div class="col-sm-11">
        <h1 class="title">Movie Insight</h1>
      </div>
  <?php
       echo "<h2>Welcome ". $_SESSION["name"]."</h2>";

        include 'inc/nav.php';
    ?>
      <form method ="get" id="logoutBtn" >
            <input type="submit" value="Logout" class="btn" name="logout" style="box-shadow: none !important; margin-top: 4px;"/>
    </form>
<div id="id02" class="">
  
  <form method="POST" class="" name="loginForm">


    <div class="containerAD">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required id="ittAD">

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required id="itpAD">
        
      
      <!--<button type="submit" class="btnAD" name="login" value="ok">Login</button> -->
      <input type="submit" name ="login" value="Login" class="btnAD btn" />
     
    </div>

   
  </form>
</div>    
<div>

</div>
<?php
            if(isset($_POST['login'])){
              echo "goMain";
                goMain();
        }
      ?>
     


    <?php
        include 'inc/footer.php';
    ?>
  </body>
</html>