<?php

    global $dbConn;
    //alert("no record found");
        $sql = "INSERT INTO my_prediction (
                userID,  
                actorID,
                actressID,
                directorID,
                movieID,
                dateSearch,
                rating
            )
            VALUES (
            :uID, :aID, :asID,dID, mID,dS,r
            )";
            
        $nPara = array();        
        $nPara[':uID'] = $_POST['uID'];
        $nPara[':aID'] = $_POST['uID'];
        $nPara[':asID'] = $_POST['uID'];
        $nPara[':dID'] = $_POST['dID'];
        $nPara[':mID'] = $_POST['mID'];
        $nPara[':dS'] = $_POST['dS'];
        $nPara[':r'] = $_POST['r'];
        
//alert('named para go');
        $stmt = $dbConn->prepare($sql);
        $stmt->execute($nPara);
 
//alert('insert complete');
?>