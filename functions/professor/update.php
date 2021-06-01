<?php 
include("../../functions/mainFunctions/conn.php");
extract($_POST);
$updateProfessor = $conn->query("UPDATE professor
                            SET fname='$fname',lname='$lname',city='$city'
                            WHERE id='$id'");
$updateaccount = $conn->query("UPDATE user_account
                            SET password='$password'
                            WHERE professor_id='$id'");
                            
if($updateProfessor && $updateaccount)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}
	echo json_encode($res);
 ?>