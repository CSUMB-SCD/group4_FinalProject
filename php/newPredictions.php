<?php   //USE NAMEDPARAMETERS TO PREVENT SQL INJECTION
    //header('Access-Control-Allow-Origin: *');
    session_start();
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
    $nPara[':uID'] = $_SESSION['userID'];
    $nPara[':aID'] = $_SESSION['actor1'];
    $nPara[':asID'] = $_SESSION['actor2'];
    $nPara[':dID'] = $_SESSION['directorID'];
    $nPara[':mID'] = $_SESSION['movieID'];
    $nPara[':r'] = $_GET['rating'];
    
    // $nPara[':uID'] = $_GET['uID'];
    // $nPara[':aID'] = $_GET['a1ID'];
    // $nPara[':asID'] = 15;//$_GET['a2ID'];
    // $nPara[':dID'] = $_GET['dID'];
    // $nPara[':mID'] = $_GET['mID'];
    // $nPara[':r'] = $_GET['rating'];

        $stmt = $dbConn->prepare($sql);
        $stmt->execute($nPara);
//alert('insert complete');
?>