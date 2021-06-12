<?php 
include("../../functions/mainFunctions/conn.php");
extract($_POST);
$updateExam = $conn->query("UPDATE exam
                            SET title='$title'
                            WHERE id='$id'");
if($updateExam)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}
	echo json_encode($res);
 ?>