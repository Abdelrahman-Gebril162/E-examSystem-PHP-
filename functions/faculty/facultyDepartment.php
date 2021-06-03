<?php 
include "../../../functions/mainFunctions/conn.php" ;
//include "functions/mainFunctions/conn.php" ;
extract($_GET);
$stmt = $conn->query("SELECT d.*,f.name as ffname,f.logo 
                     FROM department as d
                    inner join faculty as f
                    on d.faculty_id=f.id 
                    where f.id='$id'");
$facultylogo = $conn->query("SELECT f.logo FROM faculty as f where f.id='$id'");
 // set the resulting array to associative
 $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
 $res=$stmt->fetchAll();
    $facultylogo->setFetchMode(PDO::FETCH_ASSOC);
    $dd=$facultylogo->fetchAll();
 ?>