<?php 
include("conn.php");
extract($_POST);

if($rolep == "student")
{
    $stmt = $conn->query("SELECT s.picture,
                    a.email,a.password
                    FROM student as s 
                    inner join user_account as a
                    on
                    s.id=a.student_id
                    where s.N_id='$Nid'");
}
else if($rolep =="professor"){
    $stmt = $conn->query("SELECT p.picture,
                    a.email,a.password
                    FROM professor as p 
                    inner join user_account as a
                    on
                    p.id=a.professor_id
                    where p.N_id='$Nid'");
}
 // set the resulting array to associative
 $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
 $res=$stmt->fetchAll();
 echo json_encode($res);
 ?>