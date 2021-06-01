<?php 
//include("functions/mainFunctions/conn.php");
 $stmt = $conn->query("SELECT s.id,s.fname,s.lname,s.city,s.picture,f.name as ffname,d.name as ddname
                     FROM student as s 
                     inner join faculty as f
                      on
                       s.faculty_id=f.id
                       inner join department as d
                       on s.dept_id=d.id");
 // set the resulting array to associative
 $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
 $res=$stmt->fetchAll(PDO::FETCH_ASSOC);
 ?>