<?php 
include "../../functions/mainFunctions/conn.php" ;
extract($_POST);
$stmt = $conn->query("SELECT c.*,f.name as fname,f.logo FROM course as c inner join faculty as f on c.faculty_id=f.id where c.id='$id'");
 // set the resulting array to associative
 $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
 $res=$stmt->fetchAll();
 echo json_encode($res);
 ?>