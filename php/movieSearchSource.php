<?php   //USE NAMEDPARAMETERS TO PREVENT SQL INJECTION

function searchMoviePerson($person, $role){
//alert("searching for person");
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
//alert("no record found");
    $sql = "INSERT INTO movie_people (
            name,  
            roleID,
            searchCount )
            VALUES (
            :name, :roleID, :searchCount )";
            
    $nPara = array();        
    $nPara[':name'] = $person;
    $nPara[':roleID']  = $role;
    $nPara[':searchCount'] = '1';
//alert('named para go');
        $stmt = $dbConn->prepare($sql);
        $stmt->execute($nPara);
        
    $peeps = $_SESSION['peeps'];
    if($role == 1)
        $_SESSION['directorID'] = getPersonID($person, $role);
    else if($peeps == 0){
        $_SESSION['actor2'] = getPersonID($person, $role);
        $peeps = 1;
    }
    else if($peeps == 1){
        $_SESSION['actor2'] = getPersonID($person, $role);
        $peeps = 0;
    }
    $_SESSION['peeps'] = $peeps;
//alert('insert complete');
}


function updatePerson($person, $role){
//alert('record exist');
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
//alert('increase search count');    
    $searchCount = $record['searchCount'];
//alert('before increase: ' + $searchCount);
    $searchCount++;
//alert('after increase: ' + $searchCount);    
    
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
//alert('update searchCount');
    $peeps = $_SESSION['peeps'];
    if($role == 1)
        $_SESSION['directorID'] = getPersonID($person, $role);
    else if($peeps == 0){
        $_SESSION['actor1'] = getPersonID($person, $role);
        $peeps = 1;
    }
    else if($peeps == 1){
        $_SESSION['actor2'] = getPersonID($person, $role);
        $peeps = 0;
    }
    $_SESSION['peeps'] = $peeps;
}
function getMovieID($name,$date){
//alert('record exist');
    global $dbConn;
    
    $sql = "SELECT movieID 
            FROM movie_search 
            WHERE movieTitle = :name
            and dateSearch = :date";
    
    $nPara = array();
    $nPara[':name'] = $person;
    $nPara[':date'] = $date;
    $statement = $dbConn->prepare($sql);
    $statement->execute($nPara);
    $record = $statement->fetch(PDO::FETCH_ASSOC);
//alert('increase search count');    
    return $record['movieID'];
}
function getUserID($person, $user){
//alert('record exist');
    global $dbConn;
    
    $sql = "SELECT userID 
            FROM user 
            WHERE name = :name 
            AND username = :username";
    
    $nPara = array();
    $nPara[':name'] = $person;
    $nPara[':username'] = $user;
    $statement = $dbConn->prepare($sql);
    $statement->execute($nPara);
    $record = $statement->fetch(PDO::FETCH_ASSOC);
//alert('increase search count');    
    return $record['userID'];
}
function getPersonID($person, $role){
//alert('record exist');
    global $dbConn;
    
    $sql = "SELECT personID 
            FROM movie_people 
            WHERE name = :name 
            AND roleID = :roleID";
    
    $nPara = array();
    $nPara[':name'] = $person;
    $nPara[':roleID'] = $role;
    $statement = $dbConn->prepare($sql);
    $statement->execute($nPara);
    $record = $statement->fetch(PDO::FETCH_ASSOC);
//alert('increase search count');    
    return $record['personID'];
}
function addMoviePerson($person, $role){
//alert('in addDir');
    $person = strtolower($person);
    if (empty( searchMoviePerson($person, $role) )) 
        insertNewPerson($person, $role);
    else
        updatePerson($person, $role);
    }

function searchMovieSearch($title){
//alert("searching for movie");
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
//alert("no movie record found");
//alert($title);
//alert($date);
    $sql = "INSERT INTO movie_search (
                movieTitle,  
                dateSearch,
                searchCount )
                VALUES (
                :movieTitle, :dateSearch, :searchCount )";
            
    $nPara = array();        
    $nPara[':movieTitle'] = $title;
    $nPara[':dateSearch'] = $date;
    $nPara[':searchCount'] = '1';
//alert('movie - named para go');
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($nPara);
//alert('movie - insert complete');
    
    $_SESSION['movieID'] = getMovieID($title,$date);

}
    
function  updateMovie($title,$date){
//alert('movie record exist');
    global $dbConn;
    
    $sql = "SELECT searchCount 
            FROM movie_search
            WHERE movieTitle = :movieTitle";
    
    $nPara = array();
    $nPara[':movieTitle'] = $title;
    $statement = $dbConn->prepare($sql);
    $statement->execute($nPara);
    $record = $statement->fetch(PDO::FETCH_ASSOC);
//alert('increase search count');    
    $searchCount = $record['searchCount'];
//alert('before increase: ' + $searchCount);
    $searchCount++;
//alert('after increase: ' + $searchCount);    
    
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
    
    
    $_SESSION['movieID'] = getMovieID($title,$date);
//alert('update movie searchCount');
}

function addMovieSearch($title, $date){
    $title = strtolower($title);
    if(empty( searchMovieSearch($title) ))
        insertNewMovie($title, $date);
    else
        updateMovie($title,$date);
}

?>