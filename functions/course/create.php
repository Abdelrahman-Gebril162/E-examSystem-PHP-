<?php 
 include "../../functions/mainFunctions/conn.php";
 extract($_POST);
$selCourse = $conn->query("SELECT * FROM course WHERE name='$name' ");
 if($selCourse->rowCount() > 0)
 {
	$res = array("res" => "exist");
 }
 else
 {  
    $insCourse = $conn->query("INSERT INTO `course` (`id`, `name`, `description`, `credit_hours`, `level`, `chaptersNum`, `faculty_id`, `prof_id`) VALUES (NULL, '$name', '$description', '$creditHours','$facultyLevels', '$chapters', '$faculty', '$professor')");
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