<?php 
   echo '<header id="title">~ Movie Insight ~';
      if(isset($_SESSION['user'])){
         echo '<form method ="POST" id="logoutBtn" >';
         echo '<input type="submit" value="Logout" class="btnAD btn" name="logout"/>';
         echo '</form>';
      }
  echo '</header>';
?>