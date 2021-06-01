  <?php 
 include("../../functions/mainFunctions/conn.php");
 extract($_POST);
 extract($_FILES);
$selStudent = $conn->query("SELECT * FROM student WHERE N_id='$Nid' ");
$selProfessor = $conn->query("SELECT * FROM professor WHERE N_id='$Nid' ");
$selStudentMobile = $conn->query("SELECT * FROM student WHERE mobileN='$phoneNumber' ");
$selProfessorMobile = $conn->query("SELECT * FROM professor WHERE mobileN='$phoneNumber' ");
$selstudentAccount = $conn->query("SELECT email FROM user_account WHERE email='$Email' ");
 if($selStudent->rowCount() > 0  || $selProfessor->rowCount() > 0|| $selStudentMobile->rowCount() > 0| | $selProfessorMobile->rowCount() > 0 || $selstudentAccount->rowCount() > 0)
 {
	$res = array("res" => "exist");
 }
 else
 {  
    $checkImage = $_FILES['upImage']['name']==Null?"../../../upload/defaultImages/male-student-icon-png_251938.jpg":"C:\\xampp\htdocs\E-examSystem\upload\studentImages\\".$_FILES['upImage']['name'];
	$realImage="";
    if($checkImage=="../../../upload/defaultImages/male-student-icon-png_251938.jpg")
    {
        $rndImageName= rand();
        copy("C:\\xampp\\htdocs\E-examSystem\\upload\\defaultImages\\male-student-icon-png_251938.jpg","C:\\xampp\\htdocs\E-examSystem\\upload\\studentImages\\".$rndImageName.".jpg");
        $checkImage= "C:\\xampp\htdocs\E-examSystem\upload\studentImages\\".$rndImageName.".jpg";
        $imagtmp = $_FILES['upImage']['tmp_name'];
        $realImage= "../../../upload/studentImages/".$rndImageName.".jpg";
        move_uploaded_file($imagtmp,$checkImage);
    }
    else{
        $imagtmp = $_FILES['upImage']['tmp_name'];
        $realImage= "../../../upload/studentImages/".$_FILES['upImage']['name'];
        move_uploaded_file($imagtmp,$checkImage);
    }
    
    $insStudent = $conn->query("INSERT INTO student(`id`, `N_id`, `fname`, `lname`, `gender`,
     `birthdate`, `mobileN`, `country`, `city`, `picture`, `level`, `faculty_id`, `account_id`, `dept_id`)
     VALUES
     (NUll,'$Nid','$firstname','$lastname','$gender','$Birthday','$phoneNumber','$country','$city','$realImage','$facultyLevels','$faculty',Null,'$department') ");
	if($insStudent)
	{
        $last_student = $conn->lastInsertId();
        $studentAccount = $conn->query("INSERT INTO `user_account` (`id`, `email`, `password`, `created_at`, `student_id`, `professor_id`)
         VALUES 
         (NULL, '$Email', '$password', current_timestamp(), '$last_student', '8')");
         if($studentAccount)
         {
             $account_id=$conn->lastInsertId();
             $updateStudent=$conn->query("UPDATE student SET `account_id`='$account_id' WHERE `id`='$last_student'");
             if($updateStudent)
             {
                 $insertStudentRole= $conn->query("INSERT INTO `user_role` (`id`, `user_id`, `role_id`) VALUES (NULL, '$account_id', '2')");
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