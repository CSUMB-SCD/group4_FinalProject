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
        echo "goMain <br>";
        goMain();
    }
    
?>

<!DOCTYPE html>
<html>
  <meta charset='utf-8'/>
  <head>
    <title>Deliverables</title></title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
   
        <header id="title">~ Movie Insight ~
            <form method ="POST" id="logoutBtn" >
              <input type="submit" value="Logout" class="btnAD btn" name="logout"/>
            </form>
        </header>
        
        <?php
          include 'inc/nav.php';
        ?>
        <div class= "wrapper" style="width: 50% !important">
            <h4 id="welcome">Welcome </h4>
            <div id="" class=""></div>
            <h3><strong>Deliverables</strong></h3>
            <p>Our goal is to roll out a motion picture predictability application based on actresses, actors, soundtrack composers, writers, release date, budget, release day of the week, and directors prior work that affects a movie’s triumph or crash. A value will be assigned to film crew and additionally to their past movies they worked on as if it was really bad, or won an Oscar award. Likewise, if the movie was released on Christmas day, it will have a greater mean value than another made available on Labor Day weekend, or just some random day.
            </p>
          <p>Users will have their search results saved to a DB which they will be able to access later to review their previous searches.
            </p>
            <h3><strong>Extra Features</strong></h3>
          <ul>
              <li>We will enable a chat feature so that users can discuss movie predictions.
              </li>
              <li>We will allow users to upvote movie predictions and comment on them.
              </li>
              <li>Users will be able to see the top list of movies that user's wanted to have the prediction of.
              </li>
              <li>Users will be able to search through all past predictions so that they won't have to go through entire process for every movie.
              </li>
          </ul>
          
        </div>
    <?php
        include 'inc/footer.php';
    ?>
     <script>document.getElementById('welcome').innerHTML += '<?php echo $_SESSION["name"] ?>' </script>
  </body>
</html>