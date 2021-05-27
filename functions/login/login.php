<?php 
session_start();
include ("../mainFunctions/conn.php");
extract($_POST);

$selAcc = $conn->query("SELECT * FROM user_account WHERE email='$email' AND password='$pass' ");
$selAccRow = $selAcc->fetch(PDO::FETCH_ASSOC);


if($selAcc->rowCount() > 0)
{
  $_SESSION['loginSession'] = array(
  	 'user_id' => $selAccRow['id'],
     'student_role' => $selAccRow['student_id'],
     'prof_role' => $selAccRow['professor_id'],
  	 'login' => true
  );
  $res = array("res" => "success");

}
else
{
  $res = array("res" => "invalid");
}
echo json_encode($res);
 ?>