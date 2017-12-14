<?php
    header('Access-Control-Allow-Origin: *');
    include '../inc/dbConnection.php';

    $dbConn = getDBConnection();

    $sql = "SELECT numLikes
            FROM my_prediction
            WHERE movieID = :movieID";
            
    $nPara = array();
    $nPara[':movieID'] = $_GET['movieID'];
    $statement = $dbConn->prepare($sql);
    $statement->execute($nPara);
    $record = $statement->fetch(PDO::FETCH_ASSOC);
    $numLikes = $record['numLikes'];
    $numLikes = $numLikes + 1;
    
    $sql = "SET SQL_SAFE_UPDATES=0";
    $stmt = $dbConn -> prepare ($sql);
    $stmt -> execute($nPara);
    
    $sql = "UPDATE my_prediction
            SET numLikes = :numLikes
            WHERE movieID = :movieID";
     
    $nPara = array();
    $nPara[':numLikes'] = $numLikes;
    $nPara[':movieID'] = $_GET['movieID']; 
    $statement = $dbConn->prepare($sql);
    $statement->execute($nPara);
    
    
    $sql = "SET SQL_SAFE_UPDATES=1";
    $stmt = $dbConn -> prepare ($sql);
    $stmt -> execute($nPara);
?>