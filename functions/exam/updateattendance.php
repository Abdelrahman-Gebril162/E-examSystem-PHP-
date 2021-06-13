<?php 
session_start();
include("../../functions/mainFunctions/conn.php");
extract($_POST);
$studenId=$_SESSION['loginSession']['member_id'];;
$updateExam = $conn->query("UPDATE studen_exam_enroll
                            SET attendance_status='1'
                            WHERE student_id='$studenId'");


?>