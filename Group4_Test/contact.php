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
        <div class= "wrapper" style="width: 60% !important">
        <h4 id="welcome">Welcome </h4>
        <div id="" class="">
        <table width="100%">
            <tr>
                <td>
                  <h3><strong>Team G4FP Members:</strong></h3>
                     <ol>
                         <li><strong>Jessie Dowding</strong> - Project Manager - jdowding@csumb.edu<br> Git: JessDF Slack: jdowding
                         </li>
                         <li><strong>Regie Daquioag</strong> - System Engineer - rdaquiong@csumb.edu<br> Git: Regie-Daquioag Slack: Regie Daquioag
                         </li>
                         <li><strong>Samba Diallo</strong> - Software Architect - sdiallo@csumb.edu<br>Git: SambaDialloB Slack: shabashiki
                         </li>
                         <li><strong>Phillip T. Emmons</strong> - Quality Assurance - pemmons@csumb.edu <br>Git: philemmons Slack: pemmons
                         </li>
                     </ol>
                 </td>
                 <td>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12803.589104219938!2d-121.7981631!3d36.6529218!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcdbf437897f231fd!2sCalifornia+State+University%2C+Monterey+Bay!5e0!3m2!1sen!2sus!4v1510567069926" width="450" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                 </td>
         </tr>  
        </table>  
        </div>    
        </div>
    <?php
        include 'inc/footer.php';
    ?>
     <script>
         document.getElementById('welcome').innerHTML += '<?php echo $_SESSION["name"] ?>';
    </script>
     
  </body>
</html>