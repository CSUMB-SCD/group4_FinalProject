<?php   //USE NAMEDPARAMETERS TO PREVENT SQL INJECTION
    //header('Access-Control-Allow-Origin: *');
    include '../inc/dbConnection.php';
    $dbConn = getDBConnection();
    //alert("no record found");
    $sql = "INSERT INTO my_prediction (
            userID,  
            actor1ID,
            actor2ID,
            directorID,
            movieID,
            pred_result
        )
        VALUES (
        :uID, :aID, :asID,:dID, :mID,:r
        )";
        
    $nPara = array();        
    $nPara[':uID'] = $_GET['uID'];
    $nPara[':aID'] = $_GET['a1ID'];
    $nPara[':asID'] = $_GET['a2ID'];
    $nPara[':dID'] = $_GET['dID'];
    $nPara[':mID'] = $_GET['mID'];
    $nPara[':r'] = $_GET['rating'];
    
    
    //$message = "wrong answer";
    //echo "<script type='text/javascript'>alert('$message');</script>";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute($nPara);
//alert('insert complete');
?>