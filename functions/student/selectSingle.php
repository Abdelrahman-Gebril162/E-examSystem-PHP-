<?php 
include("../../functions/mainFunctions/conn.php");
//include("functions/mainFunctions/conn.php");
extract($_POST);
$stmt = $conn->query("SELECT s.id,s.fname,s.lname,s.city,s.picture,
                    f.name as ffname,
                    d.name as Dname
                    FROM student as s 
                    inner join faculty as f
                    on
                    s.faculty_id=f.id
                    inner join department as d
                    on s.dept_id=d.id
                    where s.id='$id' and s.dept_id != 'NULL'");
 // set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$res=$stmt->fetchAll();
 if(count($res)==0)
{
    $stmt = $conn->query("SELECT s.id,s.fname,s.lname,s.city,s.picture,
                    f.name as ffname
                    FROM student as s 
                    inner join faculty as f
                    on
                    s.faculty_id=f.id
                    where s.id='$id'");
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $res=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $i=0;
    foreach ($res as $key) {
        $res[$i]['Dname']="General";
        $i++;
    }
}
echo json_encode($res);
?>