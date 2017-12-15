<?php   //USE NAMEDPARAMETERS TO PREVENT SQL INJECTION

function preExeFet($sql){
    global $dbConn, $nPara;
    
    $stmt = $dbConn -> prepare ($sql);
    $stmt -> execute($nPara);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $records;
}

function preExeFetNOPARA($sql){
    global $dbConn;
    
    $stmt = $dbConn -> prepare ($sql);
    $stmt -> execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $records;
}

function getInfo( $table ) {
    $sql = "SELECT * FROM ".$table;
    return preExeFetNOPARA($sql);
}

function get($table, $column){
    $sql = "SELECT DISTINCT ".$column." FROM ".$table;
    return preExeFetNOPARA($sql);
}

function goMain(){
    global $dbConn;
    
    $userForm = $_POST['username'];
    //$pwForm = sha1($_POST['password']);   //hash("sha1",$_POST['password']);    //  !!!!!!!  must have some type of encryption for the PW  !!!!!!!!!!!!!!!!!!
    $pwForm = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = :username AND password = :password";
    
    $nPara = array(); 
    $nPara[':username'] = $userForm;
    $nPara[':password'] = $pwForm;
    
    $statement = $dbConn->prepare($sql);
    $statement->execute($nPara);
    $record = $statement->fetch(PDO::FETCH_ASSOC);

    if (empty($record)) { //wrong credentials
        echo"<form method='POST' action='index.php'>";
        echo"<span style='color:red'><h5>Wrong username or password.</h5></span>";
        echo"</form>";
    } else {
        $_SESSION["name"] = $record['name'];
        $_SESSION["email"] = $record['email'];
        $_SESSION["username"]  = $record['username'];
        $_SESSION["admin"] = $record['admin'];
        $_SESSION["joinDate"] = $record['joinDate'];
        $_SESSION["userID"] = $record['userID'];
        loginCount($_SESSION["userID"]);
        $_SESSION["user"] = "active";
        
        if( $_SESSION["admin"] == '1')
            header("Location: admin.php"); //redirect to some page
        else
            header('Location: index.php');
    }
}

//https://stackoverflow.com/questions/13851528/how-to-pop-an-alert-message-box-using-php
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

function loginCount($userID){
    global $dbConn;
//alert('in login count');    
    $sql = "SELECT loginCount 
            FROM user
            WHERE userID = :userID";
    
    $nPara = array();
    $nPara[':userID'] = $userID;
    $statement = $dbConn->prepare($sql);
    $statement->execute($nPara);
    $record = $statement->fetch(PDO::FETCH_ASSOC);
//alert('increase login count');    
    $loginCount = $record['loginCount'];
//alert('before increase: ' + $loginCount);
    $loginCount++;
//alert('after increase: ' + $loginCount);    
    
    $sql = "UPDATE user
            SET loginCount = :loginCount
            WHERE userID = :userID";
                
    $nPara = array();
    $nPara[':loginCount'] = $loginCount;
    $nPara[':userID'] = $userID;
    $statement = $dbConn->prepare($sql);
    $statement->execute($nPara);
//alert('update user loginCount');
}

//updateuser
function getUserInfo($userID){
    global $dbConn;
    $sql = "SELECT * FROM user WHERE userID = $userID"; 
    $statement = $dbConn -> prepare ($sql);
    $statement -> execute();
    $record = $statement->fetch(PDO::FETCH_ASSOC);
    return $record;
}

//New member registers
function addUser(){
    global $dbConn;
//alert('in addUser');
    if(isset($_POST['reg'])) {  //user has submitted the "register" form
//alert('user submitted');
        $sql = "INSERT INTO user (
                username,  
                password,   
                name,   
                email
            )
            VALUES (
            :username, :password, :name, :email
            )";
              
        $nPara = array();        
        $nPara[':username'] = $_POST['usernameReg'];  
//alert($_POST['usernameReg']);        
        $nPara[':password']  = $_POST['pwReg'];
//alert($_POST['usernameReg']);   
        $nPara[':name'] = $_POST['nameReg'];
//alert($_POST['nameReg']);   
        $nPara[':email'] = $_POST['emailReg'];
//alert($_POST['emailReg']); 
//alert('named para go');
        $stmt = $dbConn->prepare($sql);
        $stmt->execute($nPara);
//alert('insert complete');
    }//eof if
}

//admin updates current member
function updateUser($userID){
    global $dbConn;
    if(isset($_POST['update'])) {  //admin has submitted the "update user" form
        $sql = "UPDATE user
                SET username = :username,
                    password = :password,
                    name = :name,
                    email = :email,
                    admin = :admin
                WHERE userID = $userID";
              
        $nPara = array();        
        $nPara[':username'] = $_POST['usernameUp'];  
        $nPara[':password']  = $_POST['pwUp'];
        $nPara[':name'] = $_POST['nameUp'];
        $nPara[':email'] = $_POST['emailUp'];
        $nPara[':admin'] = $_POST['statusUp'];
        $stmt = $dbConn->prepare($sql);
        $stmt->execute($nPara);
    header('Location: userUpdate.php?userID='.$userID);
    }//eof if
}
function predictionTable($number){
    global $dbConn;
    //  $predictions = getInfo('my_prediction');
    if($number == 2){
        $user = $_SESSION["userID"];
        $sql = "SELECT movieTitle, pred_result, numLikes
                FROM (my_prediction NATURAL JOIN movie_search) 
                WHERE userID = :userID
                ORDER BY pred_result";
                
        $nPara = array();
        $nPara[':userID'] = $user;
        $statement = $dbConn->prepare($sql);
        $statement->execute($nPara);
        $record = $statement->fetchAll(PDO::FETCH_ASSOC);        
        // var_dump($user);
        
        
    }else if($number == 3){
        $sql = "SELECT movieTitle, pred_result, numLikes 
                FROM (my_prediction NATURAL JOIN movie_search) 
                ORDER BY pred_result desc LIMIT 9";
        $record = preExeFetNOPARA($sql);
                // var_dump($record);

    }
    
    foreach($record as $search) {
        echo"<tr>";
            echo "<td>".$search["movieTitle"]."</td>";
            echo "<td>".$search["pred_result"]."</td>";
            echo "<td>".$search["numLikes"]."</td>";
         echo "</tr>";
    }
}


function predictionVote(){
    
    $sql = "SELECT movieTitle, pred_result, numLikes, movieID 
                FROM my_prediction NATURAL JOIN movie_search";
    $record = preExeFet($sql);
    
//print_r($record);
  
    foreach($record as $item) {
        echo"<tr>";
            echo "<td>".$item["movieTitle"]."</td>";
            echo "<td>".$item["pred_result"]."</td>";
            echo '<td style="text-align: center;"><input type="image" src ="../img/likeBtn.png" alt="Submit" 
                    onclick= "upVote('.$item['movieID'].')" id="addONe" >';
            
            //echo '<td style="text-align: center;"><a href="upVote.php?movieID='.$item['movieID'].'&numlikes='.$item['numLikes']. 
            //        ' onclick= "return confirmVote()" ><img src="../img/likeBtn.png" /></a></td>';
         echo "</tr>";
    }
}

?>