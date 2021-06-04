<?php 
include "../../functions/mainFunctions/conn.php" ;
//include "functions/mainFunctions/conn.php" ;
/*if ($_SERVER['REQUEST_METHOD'] === 'POST') {*/
extract($_POST);
$stmt = $conn->query("SELECT c.*,courses.name as CC,f.name as FN, f.logo
                     FROM course_chapter as c
                    inner join course as courses
                    on c.course_id=courses.id 
                    inner join faculty as f
                    on courses.faculty_id = f.id WHERE `id (pk)`= '$id'");
 // set the resulting array to associative
 $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
 $res=$stmt->fetchAll();
 echo json_encode($res);
 ?>