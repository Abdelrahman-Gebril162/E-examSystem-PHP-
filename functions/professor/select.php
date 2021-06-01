<?php 
//include("functions/mainFunctions/conn.php");
 $stmt = $conn->query("SELECT p.id,p.fname,p.lname,p.city,p.picture,
                    f.name as ffname,
                    d.name as ddname
                     FROM professor as p 
                     inner join faculty as f
                      on
                       p.faculty_id=f.id
                       inner join department as d
                       on p.dept_id=d.id");
 // set the resulting array to associative
 $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
 $res=$stmt->fetchAll(PDO::FETCH_ASSOC);
 ?>