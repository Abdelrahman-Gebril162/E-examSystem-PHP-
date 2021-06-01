<?php 
 include("../../functions/mainFunctions/conn.php");
 extract($_POST);
 extract($_FILES);
$selProfessor = $conn->query("SELECT * FROM professor WHERE N_id='$Nid' ");
$selStudent = $conn->query("SELECT * FROM student WHERE N_id='$Nid' ");
$selProfessorMobile = $conn->query("SELECT * FROM professor WHERE mobileN='$phoneNumber' ");
$selStudentMobile = $conn->query("SELECT * FROM student WHERE mobileN='$phoneNumber' ");
$selProfessorAccount = $conn->query("SELECT email FROM user_account WHERE email='$Email' ");
 if($selProfessor->rowCount() > 0 ||$selStudent->rowCount() > 0|| $selProfessorMobile->rowCount() > 0 ||$selStudentMobile->rowCount() > 0 || $selProfessorAccount->rowCount() > 0)
 {
	$res = array("res" => "exist");
 }
 else
 {  
    $checkImage = $_FILES['upImage']['name']==Null?"../../../upload/defaultImages/staff.png":"C:\\xampp\htdocs\E-examSystem\upload\profImages\\".$_FILES['upImage']['name'];
	$realImage="";
    if($checkImage=="../../../upload/defaultImages/staff.png")
    {
        $rndImageName= rand();
        copy("C:\\xampp\\htdocs\E-examSystem\\upload\\defaultImages\\staff.png","C:\\xampp\\htdocs\E-examSystem\\upload\\profImages\\".$rndImageName.".png");
        $checkImage= "C:\\xampp\htdocs\E-examSystem\upload\profImages\\".$rndImageName.".png";
        $imagtmp = $_FILES['upImage']['tmp_name'];
        $realImage= "../../../upload/profImages/".$rndImageName.".png";
        move_uploaded_file($imagtmp,$checkImage);
    }
    else{
        $imagtmp = $_FILES['upImage']['tmp_name'];
        $realImage= "../../../upload/profImages/".$_FILES['upImage']['name'];
        move_uploaded_file($imagtmp,$checkImage);
    }
    
    $insProfessor = $conn->query("INSERT INTO professor(`id`, `N_id`, `fname`, `lname`, `gender`,
     `birthdate`, `mobileN`, `country`, `city`, `picture`, `faculty_id`, `account_id`, `dept_id`)
     VALUES
     (NUll,'$Nid','$firstname','$lastname','$gender','$Birthday','$phoneNumber','$country','$city','$realImage','$faculty',Null,'$department') ");
	if($insProfessor)
	{
        $last_professor = $conn->lastInsertId();
        $studentAccount = $conn->query("INSERT INTO `user_account` (`id`, `email`, `password`, `created_at`, `student_id`, `professor_id`)
         VALUES 
         (NULL, '$Email', '$password', current_timestamp(), '1', '$last_professor')");
         if($studentAccount)
         {
             $account_id=$conn->lastInsertId();
             $updateProfessor=$conn->query("UPDATE professor SET `account_id`='$account_id' WHERE `id`='$last_professor'");
             if($updateProfessor)
             {
                 $insertProfessorRole= $conn->query("INSERT INTO `user_role` (`id`, `user_id`, `role_id`) VALUES (NULL, '$account_id', '3')");
                 $res = array(
                     "res" => "success");
            }
         }
	}
	else
	{
		$res = array("res" => "failed");
	}
 }
 echo json_encode($res);
 ?>