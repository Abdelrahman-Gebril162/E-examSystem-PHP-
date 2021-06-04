<?php 
include "../../../functions/mainFunctions/conn.php" ;
//include "functions/mainFunctions/conn.php" ;
/*if ($_SERVER['REQUEST_METHOD'] === 'POST') {*/
$stmt = $conn->query("SELECT c.*,s.fname, s.lname,f.name as FN, f.logo, courses.name
                     FROM student_course_enroll as c
                    inner join student as s
                    on c.student_id=s.id 
                    inner join faculty as f
                    on s.faculty_id = f.id
                    inner join course as courses
                    on c.course_id = courses.id");
 // set the resulting array to associative
 $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
 $res=$stmt->fetchAll();
 //print_r($res);
 ?>