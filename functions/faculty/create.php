<?php 
 include "../../functions/mainFunctions/conn.php";
 extract($_POST);
 extract($_FILES);
$selFaculty = $conn->query("SELECT * FROM faculty WHERE name='$name' ");
 if($selFaculty->rowCount() > 0)
 {
	$res = array("res" => "exist");
 }
 else
 {  
    $checkImage = $_FILES['upImage']['name']==Null?"../../../upload/defaultImages/Faculty_default.png":"C:\\xampp\htdocs\E-examSystem\upload\facultyImages\\".$_FILES['upImage']['name'];
	$realImage="";
    if($checkImage=="../../../upload/defaultImages/Faculty_default.png")
    {
        $rndImageName= rand();
        copy("C:\\xampp\\htdocs\E-examSystem\\upload\\defaultImages\\Faculty_default.png","C:\\xampp\\htdocs\E-examSystem\\upload\\facultyImages\\".$rndImageName.".png");
        $checkImage= "C:\\xampp\htdocs\E-examSystem\upload\facultyImages\\".$rndImageName.".png";
        $imagtmp = $_FILES['upImage']['tmp_name'];
        $realImage= "../../../upload/facultyImages/".$rndImageName.".png";
        move_uploaded_file($imagtmp,$checkImage);
    }
    else{
        $imagtmp = $_FILES['upImage']['tmp_name'];
        $realImage= "../../../upload/facultyImages/".$_FILES['upImage']['name'];
        move_uploaded_file($imagtmp,$checkImage);
    }
    
    $insFaculty = $conn->query("INSERT INTO `faculty` (`id`, `name`, `description`, `createdAt`, `logo`, `background`, `levelsNum`, `specialYear`) VALUES (NULL, '$name', '$description', current_timestamp(), '$realImage', '$realImage', '$level', '$special') ");
	if($insFaculty)
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