<?php 
include "../../functions/mainFunctions/conn.php" ;
extract($_POST);
$stmt = $conn->query("SELECT * FROM exam where id='$id'");
 // set the resulting array to associative
 $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
 $res=$stmt->fetchAll();
 echo json_encode($res);
 ?>