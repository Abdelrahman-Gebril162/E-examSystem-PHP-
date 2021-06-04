<?php 
session_start();
include ("../mainFunctions/conn.php");
//include ("functions/mainFunctions/conn.php");
extract($_POST);

$selAcc = $conn->query("SELECT * FROM user_account WHERE email='$email' AND password='$pass' ");
$selAccRow = $selAcc->fetch(PDO::FETCH_ASSOC);

$selAccc = $conn->query("SELECT * FROM user_role inner join user_account on user_role.user_id=user_account.id WHERE user_account.email='$email'");
$ress=$selAccc->fetchAll();
if($selAcc->rowCount() > 0)
{
  $_SESSION['loginSession'] = array(
  	 'user_id' => $selAccRow['id'],
     'role_id' => $ress[0]['role_id'],
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