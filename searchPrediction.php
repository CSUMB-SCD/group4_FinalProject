<?php
    session_start();  
    
    include 'inc/dbConnection.php';
    include 'php/source.php';
  
    $dbConn = getDBConnection(); 
     
    if(!isset($_SESSION["user"])) {  
        $_SESSION["name"] = "Guest";
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
        <title>Search Prediction</title>
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
        <?php   include 'inc/header.php';
                include 'inc/nav.php';
        ?>
         <div class= "wrapper">
            <h4 id="welcome">Welcome </h4>
            <div>
                <iframe src="https://hw5-group4-chatapp.herokuapp.com/" class='myframe'></iframe>
            </div>
            
            <div style="float:left; width: 45%;">
                <input type="text" id="myInput" onkeyup="tableSearch()" placeholder="Search..">
                <br><br>
                <table id="myTable" style="width:100%;" class="predictions">
                    <thead><tr>
                            <th>Movie Title</th>
                            <th>Prediction </th>
                            <th>UpVote</th>
                    </tr></thead>
                 <tbody>
                    <tr><?php     predictionVote();    ?>
                    </tr>     
                 </tbody>
                </table>
            </div>
        </div>
        <?php   include 'inc/footer.php';    ?>

    <script>
        document.getElementById('welcome').innerHTML += '<?php echo $_SESSION["name"] ?>' 
    
        function tableSearch() {
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
<!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- jQuery dependent!!! -->
        <script>
            function upVote(movieID){
                $.ajax({
                    type: "GET",
                    url:"../php/upVote.php",
                    async: false,
                    dataType: "json",
                    data: { "movieID":movieID,
                    },
                    success: function( data, status ) {
                        if(!data)
                           alert("no data");
                        else
                        alert("success");
                    },
                    complete: function(data,status) { //optional, used for debugging purposes
                    }
                });//AJAX
            }
        </script>
    </body>
</html>

