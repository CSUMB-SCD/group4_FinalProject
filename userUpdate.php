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
    }
    
    if(isset($_GET['userID'])) {
       $user = getUserInfo($_GET['userID']);
       print_r($userInfo);
    }
?>
<!doctype html>
<html lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <head>
        <title>Update User</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        
        
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- jQuery dependent!!! -->
        <script src='js/jsValidReg.js'></script>
    </head>
    <body>
        <?php include 'inc/header.php';
            include 'inc/nav.php';
        ?>
        <div class= "wrapper">
            <h4 id="welcome">Welcome Admin, </h4>
            <form method="POST" name="updateUser" action="#" onsubmit="return validateForm()">
                <table>

                        <th><h4>Current Info</h4></th>
                        <th><h4>New Info</h4></th>
                    <tr>
                        <td class= "tdUserUpdate"><label><b>Username:  </b></label>
                            <?php echo $user['username'];?><br>
                            <label><b>Password:  </b></label>
                            <?php echo $user['password'];?><br>
                            <label><b>Name:  </b></label>
                            <?php echo $user['name'];?><br>
                            <label><b>Email:  </b></label>
                            <?php echo $user['email'];?><br>
                            <label><b>Admin Status</b></label>
                            <?php echo $user['admin'];?><br>
                            <button type="reset" name="reset" class="btnAD btn sub">Reset</button>
                            <input type="submit" name="update" class="btnAD btn sub" value= "Update"/>
                            <?php
                                if(isset($_POST['update'])){
                                    updateUser($_GET['userID']);
                                    echo "<h3 id='addUser'>Update Complete.</h3>";
                                }
                            ?>
                        </td>
                        <td rowspan="3"><label><b>Username</b></label> <span id="usernameError"></span>
                            <input type="text" name='usernameUp' placeholder="Enter Username" id="username" required class="ittAD" value="<?php echo $user['username'];?>">
                            
                            <label><b>Password</b></label><span id="pwError"></span>
                            <input type="text" name= 'pwUp' placeholder="Enter Password" id="pw" required class="itpAD" value="<?php echo $user['password'];?>">
                            
                            <label><b>Retype Password</b></label><span id="pwAgainError"></span>
                            <input type="text" placeholder="Retype Password" id="pwAgain" required class="itpAD" value="<?php echo $user['password'];?>">
                            
                            <label><b>Name</b></label>
                            <input type="text" name = 'nameUp' placeholder="Your name" id="name" required class="ittAD" value="<?php echo $user['name'];?>">
                            
                            <label><b>Email</b></label><span id="emailError"></span>
                            <input type="text" name= 'emailUp' placeholder="example@google.com" id="email" required class="ittAD" value="<?php echo $user['email'];?>">
                            
                            <label><b>Admin Status</b></label><span id="adminError"></span>
                           
                            <select name= 'statusUp' id='status' required class='ittAD'>
                                <option value="0" selected>0</option>
                                <option value="1">1</option>
                            </select>
                            <a href="admin.php" class="btnAD btn sub" style="float:right" >Go Back</a>
                        </td>
                    </tr>
                </table>  
            </form>
        </div>
        <?php include 'inc/footer.php'; ?>
<!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- jQuery dependent!!! -->
        <script src='js/jsValidReg.js'></script>
        <script>document.getElementById('welcome').innerHTML += '<?php echo $_SESSION["name"] ?>'</script>
    </body>
</html>