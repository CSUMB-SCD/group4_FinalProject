<?php
    session_start();  //start or resume an existing session
    
    include 'inc/dbConnection.php';
    include 'php/source.php';
     
    $dbConn = getDBConnection(); 
     
    if(!isset($_SESSION["user"])) {  //Check whether the admin has logged in
        $_SESSION["name"] = "Guest";
    }

    if(isset($_POST['logout'])){
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
        <title>About Us</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <?php include 'inc/header.php';
        include 'inc/nav.php';
        ?>
        <div class= "wrapper" >
            <h4 id="welcome">Welcome </h4>
            <div id="" class=""></div> 
                <h3><strong>Our Motivation:</strong></h3>
                <p>This software assists with evaluating new movies and users can straightforwardly make a decision whether to order a tickets in advance or wait until it appears on Netflix.
                </p>
                <h3><strong>Our Approach and Technologies:</strong></h3>
                <p><em>Technologies:</em> Application will be programmed on Cloud9 using JavaScript and JQuery in conjunction with PHP. Our application logic will be implemented in JavaScript/PHP and will run on Heroku. For our database we used JawsDB - Database(databites) to create, edit, and save reusable queries against your provisioned server. Databites are a custom, zero-hassle reporting solution for your database right out of the box. This also allowed us to have a persistent connection that wouldn't log out.
                </p>
                <p><em>Platform:</em> Our website will be pushed onto Heroku as it has automatic deployment features, scalability, analytical data, and developer focused.
                </p>
                <p><em>Web client:</em>  jQuery/JS/HTML5/CSS will be used for dynamic interactive user experience, and to access our API.
                </p>
                <p><em>Searches:</em>  We will be implementing the Bootstrap Table With Sorting, Searching and Paging using dataTable.js for user searches. As it is built on Bootstrap and will enable responsive searches.
                </p>
                <p><em>APIs:</em>We are using the themoviedb API to obtain information on Producers and Actors/Actresses.
                </p>
                <p><em>User Login:</em> Create account (Username, password). Once created, it will be stored in our database. When people log in, their username/password will be verified and checked that it’s in our database.
            </div>
        </div>
        <?php   include 'inc/footer.php';    ?>
        <script>document.getElementById('welcome').innerHTML += '<?php echo $_SESSION["name"] ?>' </script>
    </body>
</html>