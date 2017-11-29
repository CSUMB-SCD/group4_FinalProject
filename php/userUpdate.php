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
    
    if(isset($_POST['login'])){
        //echo "goMain <br>";
        goMain();
    }
?>

<!DOCTYPE html>
<html>
    <meta charset='utf-8'/>
    <head>
        <title>Update User</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <?php include 'inc/header.php';
        include 'inc/nav.php';
        ?>
        <div class= "wrapper">
            <table>
                <tr>
                    <td><h4 id="welcome">Welcome Admin, </h4></td>
                    <td><h4 id= 'admin'> Update Current Users</h4></td>
               </tr>  
            </table>
            
            
            <table class="table table-striped">
            <?php
            
                $users = getInfo('user');
                foreach ($users as $user) {
                    echo"<tr>";
                        echo "</td><td>".$user['userID'];
                        echo "</td><td>".$user['username'];
                        echo "</td><td>".$user['password'];
                        echo "</td><td>".$user['name'];
                        echo "</td><td>".$user['email'];
                        echo "</td><td>".$user['admin'];
                        
                    echo "</td><td><a href='php/userUpdate.php?userId=".$user['userID']."'>
                          <button type=\"button\" class=\"btn-primary btn-sm\">
                          <span class=\"glyphicon glyphicon-pencil\" aria-hidden=\"true\"></span> Update
                          </button></a>";
                   
                    echo "</td><td><a href='php/deleteUser.php?userID=".$user['userID']."' onclick= 'return confirmDelete(\"".$user['username']."\")' >
                          <button type=\"button\" class=\"btn-danger btn-sm\">
                          <span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span> Delete
                          </button></a>";               
                    echo "</td></tr>";
                    
                }
            ?>
            </table>
           
           
    
            
            
        </div>
        <?php
        include 'inc/footer.php';
        ?>
        <script>document.getElementById('welcome').innerHTML += '<?php echo $_SESSION["name"] ?>' 
      
    //https://datatables.net/reference/option
    $(document).ready(function() {
        $('#adminDisplay').DataTable({
            "lengthMenu": [5,10,20],
            "searching": false,
            "ordering": false
        });
    } );
    </script>
    </body>
</html>