<?php
    session_start();  //start or resume an existing session
    
    include 'inc/dbConnection.php';
    include 'php/source.php';
     
    $dbConn = getDBConnection(); 
     
    if(!isset($_SESSION["user"])) {  //Check whether the admin has logged in
        $_SESSION["name"] = "Guest";
        //alert("user is not logged in");
        //<!-- The Modal -->
        echo"<div id='myModal' class='modal in'>";
          //<!-- Modal content -->
          echo"<div class='modal-content'>";
            //echo"<span class='close'>&times;</span>";
            echo"<p>You haven't logged in. Please do so for this feature.</p>";
            echo"<a href='index.php'>Log in Page</a>";
          echo"</div>";
        echo"</div>";
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
        <title>myPrediction</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <style>
            input[type=text] {
                width: 130px;
                border: 2px solid #808080;
                border-radius: 4px;
                font-size: 16px;
                background-color: white;
                padding: 10px 15px 10px 25px;
                transition: width 0.4s ease-in-out;
            }
            
            input[type=text]:focus {
                width: 100%;
            }
            
        </style>
    </head>
    <body>
        <?php include 'inc/header.php';
        include 'inc/nav.php';
        ?>
        <div class= "wrapper">
            <h4 id="welcome">Welcome </h4>
            <div id="id02" class="">
                <div class="containerAD">
                    <div style="float:left; width: 47%;">
                         <h1 style="font-size:32px;">My Predictions </h1>
                        <input type="text" id="myInput" onkeyup="TableSearch()" placeholder="Search..">
                        <br><br>
                        <table id="myTable" style="width:100%;" class="predictions">
                            <thead>
                                 <tr>
                                    <th>Movie Title</th>
                                    <th>Prediction </th>
                                    <th>Likes</th>
                                </tr>
                            </thead>
                         <tbody>
                            <tr>
                                <?php predictionTable(2);?>
                             </tr>     
                         </tbody>
                        </table>
                    </div>
                    
                    <div style="float:right; width: 47%;">
                        <br><br><br>
                        <h1 style="font-size:32px;">Top Predictions </h1>
                        <table style="width:100%;" class="predictions">
                            <thead>
                                 <tr>
                                    <th>Movie Title</th>
                                    <th>Prediction </th>
                                    <th>Likes</th>
                                </tr>
                            </thead>
                         <tbody>
                            <tr>
                                <?php predictionTable(3);?>
                             </tr>     
                         </tbody>
                        </table>
                    </div>
    
                </div>
            </div>    
        </div>
        <?php
        include 'inc/footer.php';
        ?>
    </body>
            <script>document.getElementById('welcome').innerHTML += '<?php echo $_SESSION["name"] ?>' </script>
        <script>
        function TableSearch() {
            let input = document.getElementById("myInput");
            let filter = input.value;
            let table = document.getElementById("myTable");
            let tr = table.getElementsByTagName("tr");
            let td;
        
            for(let i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    if (td.innerHTML.indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }       
            }
        }
        </script>
</html>