<?php
    session_start();
    
    if (!isset($_SESSION["user"])) {  //Check whether the admin has logged in
        header("Location: index.php"); 
    }
    
    include '../inc/dbConnection.php';
    
    $dbConn = getDBConnection();
    $sql = "DELETE FROM user
            WHERE userID = " . $_GET['userID'];
    //echo $sql;   
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    
    //echo "<script type='text/javascript'>alert('Delete Successful.');</script>";
    header("Location: ../admin.php");
?>