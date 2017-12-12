<?php
    echo "<footer>";
      echo "<div id='container'>";
        echo "<a href='about.php'><div class='btnAD btn'>About Us</div></a>";
        echo "<a href='basic.php'><div class='btnAD btn'>Deliverables</div></a>";
        echo "<a href='contact.php'><div class='btnAD btn'>Contact</div></a>";
        if( $_SESSION["admin"] == '1'){
          echo "<a href='adminReport.php'><div class='btnAD btn'>Admin Report</div></a>";
        }
      echo "</div>";
    echo "</footer>";
?>