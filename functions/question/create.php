<?php 
include "../../functions/mainFunctions/conn.php";
//include "functions/mainFunctions/conn.php";
extract($_POST);
extract($_FILES);
/*$selChapter = $conn->query("SELECT * FROM `course_chapter`  WHERE `course_id` = '$c'");
$selChapterName = $conn->query("SELECT * FROM `course_chapter`  WHERE `title` = '$chapterName' and `course_id` = '$c'");
$checkNumChapterInCourse = $conn->query("SELECT chaptersNum FROM `course`  WHERE `id` = '$c'");
$counts=$checkNumChapterInCourse->setFetchMode(PDO::FETCH_ASSOC);
$count= $checkNumChapterInCourse->fetchAll();*/
$res=array();
if($ht=="snt"){
    $insQuestion = $conn->query("INSERT INTO `question_bank` 
    (`id`,`header`, `va`, `answerA`, `answerB`, `answerC`, `answerD`, `correctAnswer`, `question_mark`, `difficulty`, `question_type`, `header_type`, `course_id`, `chapter_id`) VALUES (NULL,'$header', NULL, '$ana', '$anb', '$anc', '$and', '$cha', '$mark', '$diff', '$qt', '$ht', '$c','$chapter');");
    $res = array("res" => "success");
}
else if($ht=="v" || $ht=="a"){
    extract($_FILES);
    $checkImage = $_FILES['vaSource']['name']==Null?"NUlll":"C:\\xampp\htdocs\E-examSystem\upload\questionBank\\vaSource\\".$_FILES['vaSource']['name'];
    move_uploaded_file($_FILES['vaSource']['tmp_name'],$checkImage);
    $realImage= "../../../upload/questionBank/vaSource/".$_FILES['vaSource']['name'];
    $insQuestion = $conn->query("INSERT INTO `question_bank` (`id`, `header`, `va`, `answerA`, `answerB`, `answerC`, `answerD`, `correctAnswer`, `question_mark`, `difficulty`, `question_type`, `header_type`, `course_id`, `chapter_id`) VALUES (NULL, '$header','$realImage', '$ana', '$anb', '$anc', '$and', '$cha', '$mark', '$diff', '$qt', '$ht', '$c','$chapter');");
    $res = array("res" => "success");
}
else{
		$res = array("res" => "failed");
	}
echo json_encode($res);
?>