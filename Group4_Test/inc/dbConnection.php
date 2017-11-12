<?php

function getDBConnection($dbname) {
    $host =     process.env.hKey;
    $dbname =   process.env.dbKey;
    $username = process.env.uKey;
    $password = process.env.pwKey;
    
    try {
        //Creating database connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // Setting Errorhandling to Exception
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }
    catch (PDOException $e) {
        
        echo "There was some problem connecting to the database! Error: $e";
        exit();
        
    }
    
    return $dbConn;
    
}

?>