<?php

 //PREVENT SQL INJECTION
function searchMoviePerson($person, $role){
alert("searching for person");
    global $dbConn;
    
    $sql = "SELECT * FROM movie_people WHERE name = :name AND roleID = :roleID";
    
    $nPara = array(); 
    $nPara[':name'] = $person;
    $nPara[':roleID'] = $role;
    $statement = $dbConn->prepare($sql);
    $statement->execute($nPara);
    $record = $statement->fetch(PDO::FETCH_ASSOC);
//print_r($record);
    return $record;
}

function insertNewPerson($person, $role){
    global $dbConn;
    alert("no record found");
        $sql = "INSERT INTO movie_people (
                name,  
                roleID,
                searchCount
            )
            VALUES (
            :name, :roleID, :searchCount
            )";
            
        $nPara = array();        
        $nPara[':name'] = $person;
        $nPara[':roleID']  = $role;
        $nPara[':searchCount'] = '1';
alert('named para go');
        $stmt = $dbConn->prepare($sql);
        $stmt->execute($nPara);
 
alert('insert complete');
}

function updatePerson($person, $role){
alert('record exist');
    global $dbConn;
    
    $sql = "SELECT searchCount 
            FROM movie_people 
            WHERE name = :name 
            AND roleID = :roleID";
    
    $nPara = array();
    $nPara[':name'] = $person;
    $nPara[':roleID'] = $role;
    $statement = $dbConn->prepare($sql);
    $statement->execute($nPara);
    $record = $statement->fetch(PDO::FETCH_ASSOC);
    
alert('increase search count');    
    $searchCount = $record['searchCount'];
alert('before increase: ' + $searchCount);
    $searchCount++;
alert('after increase: ' + $searchCount);    
    
    $sql = "UPDATE movie_people
            SET searchCount = :searchCount
            WHERE name = :name
            AND roleID = :roleID";
                
    $nPara = array();
    $nPara[':name'] = $person;
    $nPara[':roleID'] = $role;        
    $nPara[':searchCount'] = $searchCount;
    $statement = $dbConn->prepare($sql);
    $statement->execute($nPara);
    
alert('update searchCount');
}

function addMoviePerson($person, $role){
//alert('in addDir');
    //in the database...maybe
    $person = strtolower($person);
    if (empty( searchMoviePerson($person, $role) )) 
        insertNewPerson($person, $role);
    else
        updatePerson($person, $role);
    }
//============================================
function searchMovieSearch($title){
    alert("searching for movie");
    global $dbConn;
    
    $sql = "SELECT * 
            FROM movie_search 
            WHERE movieTitle = :movieTitle";
    
    $nPara = array(); 
    $nPara[':movieTitle'] = $title;
    $statement = $dbConn->prepare($sql);
    $statement->execute($nPara);
    $record = $statement->fetch(PDO::FETCH_ASSOC);
//print_r($record);
    return $record;
}

function insertNewMovie($title,$date){
    global $dbConn;
alert("no movie record found");
alert($title);
alert($date);
    $sql = "INSERT INTO movie_search (
                movieTitle,  
                dateSearch,
                searchCount
            )
            VALUES (
            :movieTitle, :dateSearch, :searchCount
            )";
            
        $nPara = array();        
        $nPara[':movieTitle'] = $title;
        $nPara[':dateSearch'] = $date;
        $nPara[':searchCount'] = '1';
alert('movie - named para go');
        $stmt = $dbConn->prepare($sql);
        $stmt->execute($nPara);
 
alert('movie - insert complete');
}
    
function  updateMovie($title,$date){
    alert('movie record exist');
    global $dbConn;
    
    $sql = "SELECT searchCount 
            FROM movie_search
            WHERE movieTitle = :movieTitle";
    
    $nPara = array();
    $nPara[':movieTitle'] = $title;
    $statement = $dbConn->prepare($sql);
    $statement->execute($nPara);
    $record = $statement->fetch(PDO::FETCH_ASSOC);
    
alert('increase search count');    
    $searchCount = $record['searchCount'];
alert('before increase: ' + $searchCount);
    $searchCount++;
alert('after increase: ' + $searchCount);    
    
    $sql = "UPDATE movie_search
            SET searchCount = :searchCount,
                dateSearch = :dateSearch
            WHERE movieTitle = :movieTitle";
                
    $nPara = array();
    $nPara[':movieTitle'] = $title;
    $nPara[':dateSearch'] = $date;
    $nPara[':searchCount'] = $searchCount;
    $statement = $dbConn->prepare($sql);
    $statement->execute($nPara);
    
alert('update movie searchCount');
}

function addMovieSearch($title, $date){
    $title = strtolower($title);
    if(empty( searchMovieSearch($title) ))
        insertNewMovie($title, $date);
    else
        updateMovie($title,$date);
}
//============================================
?>