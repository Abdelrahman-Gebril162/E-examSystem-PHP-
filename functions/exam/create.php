<?php 
include "../../functions/mainFunctions/conn.php";
extract($_POST);
$myPost = array_values($_POST);
//include "functions/mainFunctions/conn.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$selExam = $conn->query("SELECT * FROM exam WHERE title='$examName'");
if($selExam->rowCount() > 0)
{
	$res = array("res" => "exist");
}
else
{  
    $hoursToMin = $duration*60;
    $end = new DateTime($startDate);
    $dt=$end->add(new DateInterval('PT'.$hoursToMin.'M'));
    $endd = $dt->format('Y-m-d H:i:s');
    $totalQuestionNum =0;
    $totalEasyQ = 0;
    $totalMediumQ = 0;
    $totalHardQ = 0;
    $totalChapters=0;
    for ($i=4; $i <count($myPost)-2 ; $i+=5) { 
        $totalQuestionNum = $totalQuestionNum + (int)$myPost[$i];
        if($myPost[$i+3]=="1"){$totalEasyQ+=$myPost[$i+3];}
        elseif ($myPost[$i+3]=="2") {$totalMediumQ+=$myPost[$i+3];}
        elseif ($myPost[$i+3]=="3") {$totalHardQ+=$myPost[$i+3];}
        $totalChapters++;
    }
    $AllStudentInExamCourse = $conn->query("SELECT count(*) FROM student_course_enroll WHERE course_id='$c' ");
    $allsut2 = $AllStudentInExamCourse->setFetchMode(PDO::FETCH_ASSOC);
    $students2 = $AllStudentInExamCourse->fetchAll();
    $coun = count($students2);
    $insExam = $conn->query("INSERT INTO `exam` (`id`, `title`, `created_at`, `question_num`, `num_hard_question`, `num_medium_question`, `num_easy_question`, `startDate`, `endTime`, `numOfStudent`, `student_pass`, `status`, `type`, `need_revision`, `course_id`, `prof_id`) VALUES (NULL, '$examName', CURRENT_TIMESTAMP(), '$totalQuestionNum', '$totalHardQ', '$totalMediumQ', '$totalEasyQ', '$startDate', '$endd', '$coun', '0', 'created', '$et', 'NO', '$c', '$pn')");
    if($insExam)
	{
        $lastExam = $conn->lastInsertId();
        $insQuestion="";
        
        for ($i=4; $i <count($myPost)-4;$i+=5) {
            $htt=$myPost[$i+4];
            $qtt=$myPost[$i+2];
            $ch=$myPost[$i+1];
            $lim= $myPost[$i];
            if($myPost[$i+3]=="1")
            {
                
                for ($i=0; $i<$lim ; $i++) {
                    $ques = $conn->query("SELECT id from `question_bank` where difficulty='1' and header_type='$htt' and question_type='$qtt' and chapter_id='$ch' and course_id='$c' order by rand() limit 1");
                    $ques1 = $ques->setFetchMode(PDO::FETCH_ASSOC);
                    $ques2 = $ques->fetchAll();
                    $ques3=$ques2[0]['id'];
                    $insQuestion = $conn->query("INSERT INTO `exam_question` (`id (pk)`, `exam_id`, `question_id`) VALUES (NULL, '$lastExam','$ques3' )");
                }
            }
            elseif($myPost[$i+3]=="2")
            {
                $insQuestion = $conn->query("INSERT INTO `exam_question` (`id (pk)`, `exam_id`, `question_id`) VALUES (NULL, '$lastExam', SELECT id from question_bank where difficulty='2' and header_type='$htt' and question_type='$qtt' and chapter_id='$ch' and course_id='$c' order by rand() limit '$lim')");
            }
            elseif($myPost[$i+3]=="3")
            {
                $insQuestion = $conn->query("INSERT INTO `exam_question` (`id (pk)`, `exam_id`, `question_id`) VALUES (NULL, '$lastExam', SELECT id from question_bank where difficulty='3' and header_type='$htt' and question_type='$qtt' and chapter_id='$ch' and course_id='$c' order by rand() limit '$lim' )");
            }
        }
        if($insQuestion)
        {
            $AllStudent = $conn->query("SELECT * FROM student_course_enroll WHERE course_id='$c' ");
            $allsut = $AllStudent->setFetchMode(PDO::FETCH_ASSOC);
            $students = $AllStudent->fetchAll();
            foreach ($students as $s) {
                $d = $s['student_id'];
                $insstuden_exam_enroll = $conn->query("INSERT INTO `studen_exam_enroll` (`id`, `student_id`, `exam_id`, `totalScore`, `attendance_status`) VALUES (NULL, '$d', '$lastExam', '0', '0')");
            }
            $res = array("res" => "success");
        }	
    }
	else
	{
		$res = array("res" => "failed");
	}
}
echo json_encode($res);
}
?>