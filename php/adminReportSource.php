<?php

/*
*@input: sql string to be processed
*@output: table from the sql query
*/
function preExeFetNOPARA($sql){
    global $dbConn;
    
    $stmt = $dbConn -> prepare ($sql);
    $stmt -> execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $records;
}

function numUser(){
    $sql = "SELECT  count(*)
            FROM    user
            WHERE   admin = 0";
    return preExeFetNOPARA($sql);
}

function numAdmin(){
    $sql = "SELECT  count(*)
            FROM    user
            WHERE   admin = 1";
    return preExeFetNOPARA($sql);
}    
    
function mostUser(){
    $sql = "SELECT  username
            FROM    user
            WHERE   admin = 0
            GROUP BY username
            ORDER BY loginCount 
            DESC LIMIT 1";
    return preExeFetNOPARA($sql);
}   
    
function mostAdmin(){
    $sql = "SELECT  username
            FROM    user
            WHERE   admin = 1
            GROUP BY username
            ORDER BY loginCount 
            DESC LIMIT 1";
    return preExeFetNOPARA($sql);
}    
   
function mostDir(){
    $sql = "SELECT  name
            FROM    movie_people
            WHERE   roleID = 1
            GROUP BY name
            ORDER BY searchCount 
            DESC LIMIT 1";
    return preExeFetNOPARA($sql);
}    
    
function mostAct(){
    $sql = "SELECT  name
            FROM    movie_people
            WHERE   roleID = 2
            GROUP BY name
            ORDER BY searchCount 
            DESC LIMIT 1";
    return preExeFetNOPARA($sql);
}    

function mostMovie(){
    $sql = "SELECT  movieTitle
            FROM    movie_search
            ORDER BY searchCount 
            DESC LIMIT 1";
    return preExeFetNOPARA($sql);
}

?>