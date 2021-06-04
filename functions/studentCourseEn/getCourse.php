<?php
include("../../functions/mainFunctions/conn.php");
//include("functions/mainFunctions/conn.php");
extract($_POST);
$result = $conn->query("SELECT * FROM course WHERE faculty_id='$fId' AND level='$level'");
//$row = $result->fetch(PDO::FETCH_ASSOC);
$res = $result->fetchAll();
echo json_encode($res);