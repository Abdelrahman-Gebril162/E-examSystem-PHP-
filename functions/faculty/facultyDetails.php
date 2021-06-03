<?php 
include "../../../functions/mainFunctions/conn.php" ;
//include "functions/mainFunctions/conn.php" ;
extract($_GET);
$stmt = $conn->query("SELECT * FROM faculty where id='$id'");
 // set the resulting array to associative
 $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
 $res=$stmt->fetchAll();
 ?>