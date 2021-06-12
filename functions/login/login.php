<?php 
session_start();
include ("../mainFunctions/conn.php");
//include ("functions/mainFunctions/conn.php");
extract($_POST);

$selAcc = $conn->query("SELECT * FROM user_account WHERE email='$email' AND password='$pass' ");
$selAccRow = $selAcc->fetch(PDO::FETCH_ASSOC);

$selAccc = $conn->query("SELECT * FROM user_role inner join user_account on user_role.user_id=user_account.id WHERE user_account.email='$email'");
$ress=$selAccc->fetchAll();
$userId = $selAccRow['id'];
if($ress[0]['role_id']=="1" || $ress[0]['role_id']=="3"){
    $seluser = $conn->query("SELECT * FROM professor as p where p.account_id='$userId'");
    $prof = $seluser->fetchAll();
    $_SESSION['loginSession'] = array(
        'user_id' => $selAccRow['id'],
        'member_id' => $prof[0]['id'],
        'email' => $email,
        'role_id' => $ress[0]['role_id'],
        'fname' => $prof[0]['fname'],
        'lname ' => $prof[0]['lname'],
        'gender' => $prof[0]['gender'],
        'picture ' => $prof[0]['lname'],
        'login' => true,
        );
        if($selAcc->rowCount() > 0)
        {
        $res = array("res" => "success");
        }
        else
        {
        $res = array("res" => "invalid");
        }
}
else if($ress[0]['role_id']=="2"){
    $seluser = $conn->query("SELECT * FROM student WHERE account_id='$userId'");
    $student = $seluser->fetchAll();
    $_SESSION['loginSession'] = array(
        'user_id' => $selAccRow['id'],
        'member_id' => $student[0]['id'],
        'email' => $email,
        'role_id' => $ress[0]['role_id'],
        'fname' => $student[0]['fname'],
        'lname ' => $student[0]['lname'],
        'gender' => $student[0]['gender'],
        'picture ' => $student[0]['lname'],
        'login' => true,
        );
        if($selAcc->rowCount() > 0)
        {
        $res = array("res" => "success");
        }
        else
        {
        $res = array("res" => "invalid");
        }
}
echo json_encode($res);
?>