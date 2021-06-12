<?php 
include "../../../functions/mainFunctions/conn.php" ;
//include "functions/mainFunctions/conn.php" ;
/*if ($_SERVER['REQUEST_METHOD'] === 'POST') {*/
$stmt = $conn->query("SELECT e.*, c.name as cname, f.name as ffname from exam as e 
                    inner join professor as p 
                    on e.prof_id = p.id 
                    inner join faculty as f 
                    on f.id = p.faculty_id
                    inner join course as c
                    on
                    e.course_id=c.id");
 // set the resulting array to associative
 $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
 $res=$stmt->fetchAll();
 //print_r($res);
 ?>