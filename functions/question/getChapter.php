<?php
include("../../functions/mainFunctions/conn.php");
//include("functions/mainFunctions/conn.php");
extract($_POST);
$result = $conn->query("SELECT * FROM course_chapter WHERE course_id = '$Cid'");
//$row = $result->fetch(PDO::FETCH_ASSOC);
$res = $result->fetchAll();
echo json_encode($res);