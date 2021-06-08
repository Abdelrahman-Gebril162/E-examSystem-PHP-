<?php
include("../../functions/mainFunctions/conn.php");
//include("functions/mainFunctions/conn.php");
extract($_POST);
//$row = $result->fetch(PDO::FETCH_ASSOC);

$prof = $conn->query("SELECT * FROM professor inner join course on professor.id =course.prof_id  WHERE course.id = '$Cid'");
$pp = $prof->fetchAll();
//$profesorName = $pp[0]['fname']." ".$pp[0]['lname'];
echo json_encode($pp);