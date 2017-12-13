<?php   //USE NAMEDPARAMETERS TO PREVENT SQL INJECTION

    global $dbConn;
    //alert("no record found");
    $sql = "INSERT INTO my_prediction (
            userID,  
            actorID,
            actressID,
            directorID,
            movieID,
            rating
        )
        VALUES (
        :uID, :aID, :asID,dID, mID,r
        )";
        
    $nPara = array();        
    $nPara[':uID'] = $_POST['uID'];
    $nPara[':aID'] = $_POST['a1ID'];
    $nPara[':asID'] = $_POST['a2ID'];
    $nPara[':dID'] = $_POST['dID'];
    $nPara[':mID'] = $_POST['mID'];
    $nPara[':r'] = $_POST['rating'];
    
//alert('named para go');
        $stmt = $dbConn->prepare($sql);
        $stmt->execute($nPara);
//alert('insert complete');
?>