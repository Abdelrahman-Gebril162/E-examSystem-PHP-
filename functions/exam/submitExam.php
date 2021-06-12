<?php 
session_start();
include("../../functions/mainFunctions/conn.php");
extract($_POST);
$studentId = $_SESSION['loginSession']['member_id'];
$total=0;
foreach ($_POST as $q => $a) {
    $selqu = $conn->query("SELECT * from question_bank where id='$q'");
    $selqu->setFetchMode(PDO::FETCH_ASSOC);
    $qq= $selqu->fetchAll();
    if($qq[0]['correctAnswer']==1){
    $mark = $qq[0]['answerA']==$a?$qq[0]['question_mark']:0;
    }
    elseif($qq[0]['correctAnswer']==2){
        $mark = $qq[0]['answerB']==$a?$qq[0]['question_mark']:0;
    }
    elseif($qq[0]['correctAnswer']==3){
        $mark = $qq[0]['answerC']==$a?$qq[0]['question_mark']:0;
    }
    elseif($qq[0]['correctAnswer']==4){
        $mark = $qq[0]['answerD']==$a?$qq[0]['question_mark']:0;
    }
    $total +=$mark;
    $studen_exam_answer = $conn->query("INSERT INTO `student_exam_answer` (`id`, `student_id`, `exam_id`, `question_id`, `student_answer`, `mark`) VALUES (NULL, '$studentId', '$examid', '$q', '$a', '$mark')");
}
$updateExam = $conn->query("UPDATE studen_exam_enroll SET totalScore='10' WHERE student_id='$studentId' and exam_id='$examid'");
print_r($_POST);
?>
