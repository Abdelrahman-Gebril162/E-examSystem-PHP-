<?php 
include("../../functions/mainFunctions/conn.php");
//include("functions/mainFunctions/conn.php");
extract($_POST);
$delFaculty = $conn->query("DELETE FROM course WHERE id='$id'");
if($delFaculty)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}
	echo json_encode($res);

 ?>