<?php 
include "../../functions/mainFunctions/conn.php" ;
extract($_POST);
$stmt = $conn->query("SELECT d.*,f.name as fname,f.logo FROM department as d inner join faculty as f on d.faculty_id=f.id where d.id='$id'");
 // set the resulting array to associative
 $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
 $res=$stmt->fetchAll();
 echo json_encode($res);
 ?>