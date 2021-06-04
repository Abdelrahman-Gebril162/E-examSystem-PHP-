<?php 
include("../../functions/mainFunctions/conn.php");
extract($_POST);
$updateDepartment = $conn->query("UPDATE course
                            SET name='$name',description='$description'
                            WHERE id='$id'");
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