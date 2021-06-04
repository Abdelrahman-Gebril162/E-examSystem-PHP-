<?php 
include("../../functions/mainFunctions/conn.php");
extract($_POST);
$updateDepartment = $conn->query("UPDATE course_chapter
                            SET title='$title'
                            WHERE `id (pk)`='$id'");
if($updateDepartment)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}
	echo json_encode($res);
 ?>