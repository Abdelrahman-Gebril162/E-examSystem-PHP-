<?php 
//include("functions/mainFunctions/conn.php");
$stmt = $conn->query("SELECT s.id,s.fname,s.lname,s.city,s.picture,f.name as ffname,d.name as ddname
                    FROM student as s 
                    inner join faculty as f
                    on
                    s.faculty_id=f.id
                    inner join department as d
                    on s.dept_id=d.id where s.dept_id != null");
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
if(count($res)==0)
{
    $stmt = $conn->query("SELECT s.id,s.fname,s.lname,s.city,s.picture,f.name as ffname
    FROM student as s 
    inner join faculty as f
    on
    s.faculty_id=f.id");}
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
$i=0;
foreach ($res as $key) {
    $res[$i]['ddname']="General";
    $i++;
}
 // set the resulting array to associative
?>