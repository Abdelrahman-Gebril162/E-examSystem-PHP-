<?php 
include("../../functions/mainFunctions/conn.php");
extract($_POST);
$updateFaculty = $conn->query("UPDATE faculty
                            SET name='$name',description='$description'
                            WHERE id='$id'");
if($updateFaculty)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}
	echo json_encode($res);
 ?>