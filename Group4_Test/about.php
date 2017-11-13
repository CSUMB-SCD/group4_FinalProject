<?php
    session_start();  //start or resume an existing session
    
    include 'inc/dbConnection.php';
    include 'php/source.php';
     
    $dbConn = getDBConnection(); 
     
    if(!isset($_SESSION["user"])) {  //Check whether the admin has logged in
        $_SESSION["name"] = "Guest";
        //alert("user is not logged in");
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
    <title>About Us</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
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
             <p><em>Technologies:</em> Application will be programmed on Cloud9 using node.js in conjunction with PHP. Our application logic will be implemented in Node.js and will run on Heroku.
             </p>
             <p><em>Node.js packages:</em> will be used for unit testing, and we might be able to use node.js for the database. However, more research will need to be used to ensure it’s functionality. Specifically, we will be looking into MongoDB for the database. Our backup plan is to use MySQL with myPHP admin, and it will be used for its database functionality and it’s ability for creating and using queries to output information from the database.
             </p>
             <p><em>Platform:</em> Our website will be pushed onto Heroku as it has automatic deployment features, scalability, analytical data, and developer focused.
             </p>
             <p><em>Web client:</em> jQuery/JS/HTML5/CSS will be used for dynamic interactive user experience.
             </p>
             <p><em>Searches:</em> We will be implementing the Bootstrap Table With Sorting, Searching and Paging using dataTable.js for user searches. As it is built on Bootstrap and will enable responsive searches.
             </p>
             <p><em>APIs:</em> We are looking into using the OMDb (Open Movie Database) API is a RESTful web service to obtain movie information - however, this will depend on what the API gives us back.
             </p>
             <p><em>User Login:</em> Create account (Username, password). Once created, it will be stored in our database. When people log in, their username/password will be verified and checked that it’s in our database.
             </p>
             <p>
             </p>
            
        </div>
    <?php
        include 'inc/footer.php';
    ?>
     <script>document.getElementById('welcome').innerHTML += '<?php echo $_SESSION["name"] ?>' </script>
  </body>
</html>