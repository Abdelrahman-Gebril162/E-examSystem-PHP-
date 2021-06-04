<?php 
 include "../../functions/mainFunctions/conn.php";
 extract($_POST);
$selDepartment = $conn->query("SELECT * FROM department WHERE name='$name' ");
 if($selDepartment->rowCount() > 0)
 {
	$res = array("res" => "exist");
 }
 else
 {  
    $insDepartment = $conn->query("INSERT INTO `department` (`id`, `name`, `description`, `faculty_id`) VALUES (NULL, '$name', '$description','$faculty') ");
	if($insDepartment)
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