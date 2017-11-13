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
    <title>Contact Us</title>
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
        <div class= "wrapper" style="width: 40% !important">
        <h4 id="welcome">Welcome </h4>
        <div id="" class="">
          <h3>Team Members: </h3>
         <ol>
             <li>Jessie Dowding - Project Manager - jdowding@csumb.edu Git: JessDF Slack: jdowding
             </li>
             <li>Regie Daquioag - System Engineer - rdaquiong@csumb.edu Git: Regie-Daquioag Slack: Regie Daquioag
             </li>
             <li>Samba Diallo - Software Architect - sdiallo@csumb.edu Git: SambaDialloB Slack: shabashiki
             </li>
             <li>Phillip T. Emmons - Quality Assurance - pemmons@csumb.edu Git: philemmons Slack: pemmons
             </li>
         </ol>  
          
        </div>    
        </div>
    <?php
        include 'inc/footer.php';
    ?>
     <script>document.getElementById('welcome').innerHTML += '<?php echo $_SESSION["name"] ?>' </script>
  </body>
</html>