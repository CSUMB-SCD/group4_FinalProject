<?php
    session_start();  //start or resume an existing session
    
    include 'inc/dbConnection.php';
    include 'php/source.php';
     
    $dbConn = getDBConnection(); 
     
    if($_SESSION["admin"] == "0") {  //Check whether the admin has logged in
        header("Location: login.php"); 
    }

    if(isset($_POST['logout'])){
        session_destroy();
        header("Location: index.php");
    }
    
    if(isset($_POST['login'])){
        goMain();
    }
?>

<!DOCTYPE html>
<html>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <head>
        <title>Admin</title>
<!--DATA TABLES-->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">

        <link rel="stylesheet" href="css/styles.css">
        <style>
            th{
                text-align: center;
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
                    <td><h4 id="welcome">Welcome Admin: </h4>
               </tr>  
            </table>
            
            <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
            
                <thead>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Admin</th>
                    <th>Update</th>
                    <th>Delete</th>
                </thead>
                <tbody>
            <?php
            
                $users = getInfo('user');
                foreach ($users as $user) {
                    echo"<tr>";
                        echo "<td>".$user['userID'];
                        echo "</td><td>".$user['username'];
                        echo "</td><td>".$user['password'];
                        echo "</td><td>".$user['name'];
                        echo "</td><td>".$user['email'];
                        echo "</td><td>".$user['admin'];
                        
                    echo "</td><td><a href='userUpdate.php?userID=".$user['userID']."'>
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
            </tbody>
            </table>
           
           
    
        </div>
        <?php
        include 'inc/footer.php';
        ?>
<!--DATA TABLES-->
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script>
        document.getElementById('welcome').innerHTML += '<?php echo $_SESSION["name"] ?>'
        
         function confirmDelete(userName){
            var confirmDelete = confirm("This is permanent.\n" + userName + " will be deleted.");
            if (!confirmDelete){
                return false;
            }else{
                return true;
            }
        } 
      
        //https://datatables.net/reference/option
        $(document).ready(function() {
            $('#example').DataTable();
             scrollCollapse: true
        } );
    </script>
    </body>
</html>