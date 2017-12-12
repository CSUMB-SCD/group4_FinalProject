<?php    //https://devcenter.heroku.com/articles/jawsdb#using-jawsdb-with-php
function getDBConnection(){
    $url = getenv('JAWSDB_URL');
    $dbparts = parse_url($url);
    
    $hostname = $dbparts['host'];
//echo $hostname."   ";
    $username = $dbparts['user'];
//echo $username."   ";
    $password = $dbparts['pass'];
//echo $password."   ";
    $database = ltrim($dbparts['path'],'/');
//echo $database."   ";
    
    try {
        //Creating database connection
        $dbConn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
        // Setting Errorhandling to Exception
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        //echo "Connected successfully <br>";
    }
    catch (PDOException $e) {
        echo "There was some problem connecting to the database! Error: $e";
        exit();
    }
    return $dbConn;
}

function getDataBySQL($sql){
    $conn = getDBConnection();
    $result = $conn->query($sql);
    return $result;
}
?>