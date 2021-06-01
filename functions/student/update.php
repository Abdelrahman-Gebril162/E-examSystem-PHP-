<?php 
include("../../functions/mainFunctions/conn.php");
extract($_POST);
$updatestudent = $conn->query("UPDATE student
                            SET fname='$fname',lname='$lname',city='$city'
                            WHERE id='$id'");
$updateaccount = $conn->query("UPDATE user_account
                            SET password='$password'
                            WHERE student_id='$id'");
                            
if($updatestudent && $updateaccount)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}
	echo json_encode($res);
 ?>