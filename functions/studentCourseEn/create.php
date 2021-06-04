<?php 
 include "../../functions/mainFunctions/conn.php";
 extract($_POST);
 $selFaculty = $conn->query("SELECT * FROM `student_course_enroll`  WHERE `student_id`='$StudentName' AND  `course_id`='$CourseName'");
 if($selFaculty->rowCount() > 0)
 {
	$res = array("res" => "exist");
 }
 else{
    $select ="";
    $insCourse = $conn->query("INSERT INTO `student_course_enroll` (`id`, `student_id`, `course_id`, `grade`) VALUES (NULL, '$StudentName', '$CourseName',NULL)");
	if($insCourse)
	{
        $res = array("res" => "success");
	}
	else
	{
		$res = array("res" => "failed");
	}
}
 echo json_encode($res);
 ?>