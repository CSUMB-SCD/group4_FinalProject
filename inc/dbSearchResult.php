<?php
include 'dbConnection.php';

$conn = getDatabaseConnection("c9");

$GLOBALS['movieTitle'] = $_GET['movieTitle'];
$GLOBALS['movieDate'] = $_GET['movieDate'];
$GLOBALS['producersName'] = $_GET['producersName'];
$GLOBALS['actorActress'] = $_GET['actorActress'];

/*
- Add search to database
- Check if already looked up
- If looked up, then grab that result
- If result there too long, then re-get from api
*/

$sql = "";
$statement = $conn->prepare($sql);
$statement->execute(array(":username"=>$_GET['username']));
$result = $statement->fetch(PDO::FETCH_ASSOC);
?>