<?php 
session_start();
include "../../../functions/mainFunctions/conn.php";
$userId = $_SESSION['loginSession']['member_id'];
$role=$_SESSION['loginSession']['role_id'];
$res="";
$res2="";
$res3="";
if($role==1 || $role==3){
    $stmt = $conn->query("SELECT p.*,c.*,f.name as ffname ,d.name as ddname,ua.email as email FROM course as c inner join professor as p on p.id=c.prof_id
                        inner join faculty as f
                        on p.faculty_id =f.id
                        inner join department as d
                        on p.dept_id =d.id
                        inner join user_account as ua
                        on p.account_id = ua.id
                        where p.id='$userId'");
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $res=$stmt->fetchAll();
}
else{
    $stmt = $conn->query("SELECT s.*,c.*,sce.grade as grade,f.name as ffname,d.name as ddname, ua.email as email FROM student_course_enroll as sce
                        inner join student as s
                        on s.id=sce.student_id
                        inner join course as c 
                        on sce.course_id = c.id
                        inner join faculty as f
                        on s.faculty_id = f.id
                        inner join department as d
                        on s.dept_id = d.id
                        inner join user_account as ua
                        on s.account_id = ua.id
                        where s.id='$userId'");
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $res=$stmt->fetchAll();

    if($res==NULL){
        $stmt = $conn->query("SELECT s.*,f.name as ffname,d.name as ddname, ua.email as email FROM student as s
                        inner join faculty as f
                        on s.faculty_id = f.id
                        inner join department as d
                        on s.dept_id = d.id
                        inner join user_account as ua
                        on s.account_id = ua.id
                        where s.id='$userId'");
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $res3=$stmt->fetchAll();
    }
    else if($res !=NULL){
    $examTotal = $conn->query("SELECT c.name,SUM(qb.question_mark) as CSum from question_bank as qb 
                            inner join course as c
                            on c.id =qb.course_id
                            group by course_id");
    // set the resulting array to associative
    $result2 = $examTotal->setFetchMode(PDO::FETCH_ASSOC);
    $res2=$examTotal->fetchAll();
    }
    //$examTotal = $conn->query("SELECT course_id,sum(question_mark) as CSum from question_bank ");
    // set the resulting array to associative
    

}
//}
?>