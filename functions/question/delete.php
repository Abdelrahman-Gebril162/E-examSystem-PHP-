<?php 
include("../../functions/mainFunctions/conn.php");
//include("functions/mainFunctions/conn.php");
extract($_POST);
$selimage = $conn->query("SELECT va FROM question_bank WHERE `id`='$id'");
$selimage->setFetchMode(PDO::FETCH_ASSOC);
$fullpath = $selimage->fetchAll();
$img =$fullpath[0]['va'];
$imgName=substr($img,38);
unlink("C:\\xampp\htdocs\E-examSystem\upload\questionBank\\vaSource\\".$imgName);
$delFaculty = $conn->query("DELETE FROM question_bank WHERE `id`='$id'");
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