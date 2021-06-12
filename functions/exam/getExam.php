<?php 
include "../../../functions/mainFunctions/conn.php" ;
//include "functions/mainFunctions/conn.php" ;
/*if ($_SERVER['REQUEST_METHOD'] === 'POST') {*/
extract($_GET);

$question = $conn->query("SELECT * from exam_question as eq inner join question_bank as qb on eq.question_id=qb.id where exam_id='$id'");
//set the resulting array to associative
$question->setFetchMode(PDO::FETCH_ASSOC);
$res=$question->fetchAll();

$prof = $conn->query("SELECT fname,lname,e.* from exam as e inner join professor as p on e.prof_id=p.id where e.id='$id'");
$prof->setFetchMode(PDO::FETCH_ASSOC);
$profR=$prof->fetchAll();
$profName= $profR[0]['fname']." ".$profR[0]['lname'];


$courseD = $conn->query("SELECT c.name as cname,c.level,c.id from exam as e 
                    inner join course as c
                    on e.course_id = c.id
                    where e.id='$id'");
$courseD->setFetchMode(PDO::FETCH_ASSOC);
$courseDR=$courseD->fetchAll();
$courseName= $courseDR[0]['cname'];
$level = $courseDR[0]['level'];
$courseid= $courseDR[0]['id'];
//echo json_encode($res);

$du = $conn->query("SELECT TIMEDIFF(endTime,startDate) as diff from exam where id='$id'");
$du->setFetchMode(PDO::FETCH_ASSOC);
$duR=$du->fetchAll();
$duration = $duR[0]['diff'];

$dum = $conn->query("SELECT TIMESTAMPDIFF(MicroSEcond ,endTime,startDate) as m from exam where id='$id'");
$dum->setFetchMode(PDO::FETCH_ASSOC);
$dumR=$dum->fetchAll();
$durationm = $dumR[0]['m'];

$faculty = $conn->query("SELECT faculty.name as ffname from course inner join faculty on course.faculty_id=faculty.id where course.id='$courseid'");
$faculty->setFetchMode(PDO::FETCH_ASSOC);
$facultyR=$faculty->fetchAll();
$facultyName=$facultyR[0]['ffname'];
?>