<?php
    session_start();  //start or resume an existing session
    
    include 'inc/dbConnection.php';
    include 'php/source.php';
     
    $dbConn = getDBConnection(); 
     
    if($_SESSION["admin"] == "0") {  //Check whether the admin has logged in
        header("Location: login.php"); 
    }

    if(isset($_POST['logout'])){
        //$_SESSION =[];
        session_destroy();
        header("Location: index.php");
        //alert("logged out");
    }
    
    //NOTE: the next 3 sections of code sequence matters for the updated output
    
  if(isset($_GET['userID'])) {
   $user = getUserInfo($_GET['userID']);
   print_r($userInfo);
}

?>




<!DOCTYPE html>
<html>
    <meta charset='utf-8'/>
    <head>
        <title>Update User</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        
        
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- jQuery dependent!!! -->
        <script src='js/jsValidReg.js'></script>
        <style>
          tr,td{
            border: solid 1px #000;
          }
        </style>
    </head>
    <body>
        <?php include 'inc/header.php';
            include 'inc/nav.php';
        ?>
        <div class= "wrapper">
            <table>
                <tr>
                    <td><h4 id="welcome">Welcome Admin, </h4></td>
                    <td><h4 id= 'admin'> Update User</h4></td>
               </tr>  
            </table>
 <form method="POST" name="updateUser" action="#" onsubmit="return validateForm()">
<table>
  <tr>
    <td>
      <label><b>Username</b></label><br>
      <?php echo $user['username'];?>
    </td>
     <td rowspan="5">
       <label><b>Username</b></label> <span id="usernameError"></span>
       <input type="text" name='usernameUp' placeholder="Enter Username" id="username" required class="ittAD">
        
        <label><b>Password</b></label><span id="pwError"></span>
        <input type="text" name= 'pwUp' placeholder="Enter Password" id="pw" required class="itpAD">
        
        
        <label><b>Retype Password</b></label><span id="pwAgainError"></span>
        <input type="text" placeholder="Retype Password" id="pwAgain" required class="itpAD">
        
        
        <label><b>Name</b></label>
        <input type="text" name = 'nameUp' placeholder="Your name" id="name" required class="ittAD">
        
        <label><b>Email</b></label><span id="emailError"></span>
        <input type="text" name= 'emailUp' placeholder="example@google.com" id="email" required class="ittAD">
        
        <label><b>Admin Status</b></label><span id="adminError"></span>
        <!--<input type="text" name= 'admin' placeholder="0 or 1" id="admin" required class="ittAD">-->
         <select name= 'statusUp' id='status' required class='ittAD'>
          <option value="0">0</option>
          <option value="1">1</option>
        </select> 
     </td>
    </tr>
  <tr>
    <td>
      <label><b>Password</b></label><br>
      <?php echo $user['password'];?>
      </td>
    </tr>    
  <tr>
    <td>
      <label><b>Name</b></label><br>
      <?php echo $user['name'];?>
      </td>
    </tr>    
  <tr>
    <td>
      <label><b>Email</b></label><br>
      <?php echo $user['email'];?>
    </td>
    </tr>
   <tr >
    <td>
      <label><b>Admin Status</b></label><br>
      <?php echo $user['admin'];?>
    </td>
  </tr>
  <tr>
    <td>
        <button type="reset" name="reset" class="btnAD btn sub">Reset</button>
      <input type="submit" name="update" class="btnAD btn sub" value= "Update"/>
      <?php
            if(isset($_POST['update'])){
                updateUser($_GET['userID']);
                echo "<h3 id='addUser'>Update Complete.</h3>";
            }
        ?>
      
      </td>
      <td>
      <a href="admin.php" class="btnAD btn sub" style="float:right" >Go Back</a>
    </td>
  </tr>
</table>  
</form>
     
</div>

        <?php
        include 'inc/footer.php';
        ?>
        <script>document.getElementById('welcome').innerHTML += '<?php echo $_SESSION["name"] ?>'</script>
    </body>
</html>