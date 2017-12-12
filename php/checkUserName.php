<?php   //USE NAMEDPARAMETERS TO PREVENT SQL INJECTION
header('Access-Control-Allow-Origin: *');
include '../inc/dbConnection.php';
$dbConn = getDBConnection();

    $sql = "SELECT username 
            FROM user
            WHERE username = :username";

    $statement = $dbConn->prepare($sql);
    $npara = array();
    $npara[":username"] = $_GET['username'];
    $statement->execute( $npara );
    $record = $statement->fetch(PDO::FETCH_ASSOC);
    
    //print_r($record);
    echo json_encode($record); //jsonp -> "json format with padding"
?>