<?php 
include "../../../functions/mainFunctions/conn.php" ;
//include "functions/mainFunctions/conn.php" ;
/*if ($_SERVER['REQUEST_METHOD'] === 'POST') {*/
$stmt = $conn->query("SELECT q.*,
                    c.name,c.level,
                    ch.title,
                    f.name as ff
                    from question_bank as q
                    inner join course as c
                    on q.course_id=c.id
                    inner join course_chapter as ch
                    on q.chapter_id=ch.`id (pk)`
                    inner join faculty as f on
                    c.faculty_id = f.id
                    ");
 // set the resulting array to associative
 $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
 $res=$stmt->fetchAll();
 //print_r($res);
 ?>