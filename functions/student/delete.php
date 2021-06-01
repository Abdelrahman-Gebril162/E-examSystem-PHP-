<?php 
include("../../functions/mainFunctions/conn.php");
extract($_POST);
$delCourse = $conn->query("DELETE FROM student WHERE id='$id'  ");
$p=substr($picture,30);
unlink("C:\\xampp\htdocs\E-examSystem\upload\studentImages\\".$p);
if($delCourse)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}
	echo json_encode($res);
 ?>