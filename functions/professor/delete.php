<?php 
include("../../functions/mainFunctions/conn.php");
extract($_POST);
$delProf = $conn->query("DELETE FROM professor WHERE id='$id'  ");
$p=substr($picture,27);
unlink("C:\\xampp\htdocs\E-examSystem\upload\profImages\\".$p);
if($delProf)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}
	echo json_encode($res);
 ?>