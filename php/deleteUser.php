<?php
    session_start();
    
    if (!isset($_SESSION["user"])) {  //Check whether the admin has logged in
        header("Location: index.php"); 
    }
    
    include '../inc/dbConnection.php';
    
    $dbConn = getDBConnection();
    $sql = "DELETE FROM user
            WHERE userID = " . $_GET['userID'];
    echo $sql;   
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    
    header("Location: ../admin.php");
?>