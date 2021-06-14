<?php 
include "../../../functions/mainFunctions/conn.php" ;
//include "functions/mainFunctions/conn.php" ;
extract($_GET);
$res="";
$stmt = $conn->query("SELECT s.*,f.name as ffname, d.name as ddname,f.logo 
                     FROM student as s
                    inner join faculty as f
                    on s.faculty_id=f.id 
                    inner join department as d
                    on s.dept_id=d.id
                    where f.id='$id' and s.dept_id != 'NULL'");
$facultylogo = $conn->query("SELECT f.logo FROM faculty as f where f.id='$id'");
$facultylogo->setFetchMode(PDO::FETCH_ASSOC);
$dd=$facultylogo->fetchAll();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$res=$stmt->fetchAll();

/*if(count($res)==0)
{
    $stmt = $conn->query("SELECT s.*,f.name as ffname,f.logo 
                    FROM student as s
                    inner join faculty as f
                    on s.faculty_id=f.id 
                    where f.id='$id'");
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $res2=$stmt->fetchAll(PDO::FETCH_ASSOC);
                    print_r($res);
}

$i=0;
foreach ($res as $key) {
    $res[$i]['ddname']="General";
    $i++;
}
*/
 ?>