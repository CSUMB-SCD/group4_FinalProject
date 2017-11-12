<?php
function getDBConnection() {
    
    // //https://devcenter.heroku.com/articles/jawsdb#using-jawsdb-with-php
    $url = getenv('JAWSDB_URL');
    $dbparts = parse_url($url);
    
    $host = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $dbname = ltrim($dbparts['path'],'/');


    // $host =     process.env.hKey;
    // //$dbname =   process.env.dbKey;
    // $username = process.env.uKey;
    // $password = process.env.pwKey;
    try {
        //Creating database connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // Setting Errorhandling to Exception
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
         echo "Connected successfully";
    }
    catch (PDOException $e) {
        
        echo "There was some problem connecting to the database! Error: $e";
        exit();
        
    }
    
    return $dbConn;
    
}




// - OLD 
// function getDBConnection() {
//     $host =     process.env.hKey;
//     $dbname =   process.env.dbKey;
//     $username = process.env.uKey;
//     $password = process.env.pwKey;
    
//     try {
//         //Creating database connection
//         $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//         // Setting Errorhandling to Exception
//         $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
//     }
//     catch (PDOException $e) {
        
//         echo "There was some problem connecting to the database! Error: $e";
//         exit();
        
//     }
    
//     return $dbConn;
    
// }

?>