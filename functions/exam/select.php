<?php 
include "../../functions/mainFunctions/conn.php" ;
//include "functions/mainFunctions/conn.php" ;
/*if ($_SERVER['REQUEST_METHOD'] === 'POST') {*/
extract($_POST);
$stmt = $conn->query("SELECT q.* from question_bank as q where chapter_id='$Cid' and course_id='$course' ");
 // set the resulting array to associative
 $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
 $res=$stmt->fetchAll();
 echo json_encode($res);
 ?>