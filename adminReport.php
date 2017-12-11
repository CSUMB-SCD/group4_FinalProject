<?php
    session_start();  //start or resume an existing session
    
    include 'inc/dbConnection.php';
    include 'php/source.php';
    include 'php/adminReportSource.php';
    
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
        <title>Admin Report</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <style>
            .adminReport{
                width: 50%;
                margin-top: 2.0em
                
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
           
                <table class="table table-striped table-bordered adminReport">
                    <th colspan ='2'>Admin Report</th>
                    <tr>
                        <td>Number Users:</td><td><?php numUser(); ?></td>
                    </tr><tr>
                        <td>Number Admins:</td><td><?php numAdmin(); ?></td>
                    </tr><tr>
                        <td>Most Login User:</td><td><?php mostUser(); ?></td>
                    </tr><tr>
                        <td>Most Login Admin:</td><td><?php mostAdmin(); ?></td>
                    </tr><tr>
                        <td>Most Searched Director:</td><td><?php mostDir(); ?></td>
                    </tr><tr>
                        <td>Most Searched Actor:</td><td><?php mostAct(); ?></td>
                    </tr><tr>
                        <td>Most Searched Movie:</td><td><?php mostMovie(); ?></td>
                    </tr>
                </table> 
            
        </div>
        <?php
        include 'inc/footer.php';
        ?>
        <script>document.getElementById('welcome').innerHTML += '<?php echo $_SESSION["name"] ?>' </script>
    </body>
</html>