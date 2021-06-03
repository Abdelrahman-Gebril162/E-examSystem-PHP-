<?php 
//include "functions/mainFunctions/conn.php";
 $stmt = $conn->query("SELECT * FROM faculty");
 // set the resulting array to associative
 $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
 $res=$stmt->fetchAll();
 //print_r($res);
 ?>