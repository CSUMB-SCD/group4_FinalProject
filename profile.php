<?php
    session_start();  //start or resume an existing session
    
    include 'inc/dbConnection.php';
    include 'php/source.php';
     
    $dbConn = getDBConnection(); 
     
    if(!isset($_SESSION["user"])) {  //Check whether the admin has logged in
        $_SESSION["name"] = "Guest";
    }

    if(isset($_POST['logout'])){
        //$_SESSION =[];
        session_destroy();
        header("Location: index.php");
    }
    
    if(isset($_POST['login'])){
        //echo "goMain <br>";
        goMain();
    }
?>

<!doctype html>
<html lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <head>
        <title>Profile</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <style>
            table {
                width: 30%;
            }
            td{
                padding-right: 15px;
            }
        </style>
    </head>
    <body>
        <?php include 'inc/header.php';
        include 'inc/nav.php';
        ?>
        <div class= "wrapper">
            <h4 id="welcome">Welcome </h4>
            <div class="containerAD">
                <table >
                    <tr class="ittAD">
                        <td><label><b>Username: </b></label></td>
                        <td><?php echo "{$_SESSION['username']}"; ?></td>
                    </tr><tr class="ittAD">
                        <td><label><b>Name: </b></label></td>
                        <td><?php echo "{$_SESSION['name']}"; ?></td>
                    </tr><tr class="ittAD">
                        <td><label><b>Email: </b></label></td>
                        <td><?php echo "{$_SESSION['email']}"; ?></td>
                    </tr><tr class="ittAD">
                        <td><label><b>Admin Status: </b></label></td>
                        <td><?php   if( $_SESSION['admin'] == '1') echo "Positive";
                                    else echo "Negative";    ?></td>
                    </tr><tr class="ittAD">
                        <td><label><b>Join Date: </b></label></td>
                        <td><?php $datetime = explode(" ",$_SESSION['joinDate']);
                                  echo $datetime[0]; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <?php   include 'inc/footer.php';    ?>
        <script>document.getElementById('welcome').innerHTML += '<?php echo $_SESSION["name"] ?>' </script>
    </body>
</html>