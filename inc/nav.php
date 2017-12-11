<?php
    echo "<div class='topnav'>";
        echo "<a href='index.php'>Home</a>";
        echo "<a href='searchPrediction.php'>Search Prediction</a>";
        echo "<a href='movieSearch.php'>Movie Search</a>";
        echo "<a href='myPrediction.php'>myPrediction</a>";
        if( $_SESSION["admin"] == '1'){
        echo "<a href='admin.php'>Admin</a>";
        }
    echo "</div>";
    
    echo '<div id=bgRight></div>';
    echo '<div id=bgLeft></div>';
?>