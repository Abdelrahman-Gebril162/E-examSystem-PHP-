<?php 
include "../../../functions/mainFunctions/conn.php" ;
//include "functions/mainFunctions/conn.php" ;
extract($_GET);
$stmt = $conn->query("SELECT p.*,f.name as ffname, d.name as ddname,f.logo 
                     FROM professor as p
                    inner join faculty as f
                    on p.faculty_id=f.id 
                    inner join department as d
                    on p.dept_id=d.id
                    where f.id='$id'");
$facultylogo = $conn->query("SELECT f.logo FROM faculty as f where f.id='$id'");
 // set the resulting array to associative
 $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
 $res=$stmt->fetchAll();
    $facultylogo->setFetchMode(PDO::FETCH_ASSOC);
    $dd=$facultylogo->fetchAll();
 ?>