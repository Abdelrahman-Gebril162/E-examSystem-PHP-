<?php 
include("functions/mainFunctions/conn.php");
//include("functions/mainFunctions/conn.php");
extract($_POST);
$delstudent = $conn->query("SELECT picture FROM student WHERE faculty_id='$id'");
$delstudent->setFetchMode(PDO::FETCH_ASSOC);
$st=$delstudent->fetchAll();
$delprof = $conn->query("SELECT picture FROM professor WHERE faculty_id='$id'  ");
$delprof->setFetchMode(PDO::FETCH_ASSOC);
$pr=$delprof->fetchAll();
$delFaculty = $conn->query("DELETE FROM faculty WHERE id='$id'");
$f=substr($picture,31);
unlink("C:\\xampp\htdocs\E-examSystem\upload\facultyImages\\".$f);
foreach ($st as $s) {
    unlink("C:\\xampp\htdocs\E-examSystem\upload\studentImages\\".substr($s['picture'],30));
}
foreach ($pr as $p) {
    unlink("C:\\xampp\htdocs\E-examSystem\upload\profImages\\".substr($p['picture'],27));
}
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