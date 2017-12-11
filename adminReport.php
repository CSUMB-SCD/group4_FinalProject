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

<!doctype html>
<html lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <head>
        <title>Admin Report</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <style>
            .adminReport{
                width: 50%;
                margin-top: 2.0em;
                font-size: 1.5em;
            }
            .title{
                text-align:right;
            }
            td{

                width: 50%;
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
           
                <table class="table table-striped adminReport">
                    <th colspan ='2'>Admin Report</th>
                    <tr>
                        <!--https://stackoverflow.com/questions/1921421/get-the-first-element-of-an-array-->
                        <td class='title'>Number Users:</td><td><?php echo reset( numUser() ); ?></td>
                    </tr><tr>
                        <td class='title'>Number Admins:</td><td><?php echo reset( numAdmin() ); ?></td>
                    </tr><tr>
                        <td class='title'>Most Login User:</td><td><?php echo reset( mostUser() ); ?></td>
                    </tr><tr>
                        <td class='title'>Most Login Admin:</td><td><?php echo reset( mostAdmin() ); ?></td>
                    </tr><tr>
                        <td class='title'>Most Searched Director:</td><td><?php echo reset( mostDir() ); ?></td>
                    </tr><tr>
                        <td class='title'>Most Searched Actor:</td><td><?php echo reset( mostAct() ); ?></td>
                    </tr><tr>
                        <td class='title'>Most Searched Movie:</td><td><?php echo reset( mostMovie() ); ?></td>
                    </tr>
                </table> 
            
        </div>
        <?php
        include 'inc/footer.php';
        ?>
        <script>document.getElementById('welcome').innerHTML += '<?php echo $_SESSION["name"] ?>' </script>
    </body>
</html>