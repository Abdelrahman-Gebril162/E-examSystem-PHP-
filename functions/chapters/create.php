<?php 
include "../../functions/mainFunctions/conn.php";
//include "functions/mainFunctions/conn.php";
extract($_POST);
$selChapter = $conn->query("SELECT * FROM `course_chapter`  WHERE `course_id` = '$c'");
$selChapterName = $conn->query("SELECT * FROM `course_chapter`  WHERE `title` = '$chapterName' and `course_id` = '$c'");
$checkNumChapterInCourse = $conn->query("SELECT chaptersNum FROM `course`  WHERE `id` = '$c'");
$counts=$checkNumChapterInCourse->setFetchMode(PDO::FETCH_ASSOC);
$count= $checkNumChapterInCourse->fetchAll();

$res="";
if($selChapter->rowCount()==$count[0]['chaptersNum']){
    $res = array("res" => "max");
}
else if($selChapterName->rowCount()>0){
    $res = array("res" => "founded");
}
else{
    $insChapter = $conn->query("INSERT INTO `course_chapter` (`id (pk)`, `title`, `course_id`) VALUES (NULL, '$chapterName', '$c')");
	if($insChapter)
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