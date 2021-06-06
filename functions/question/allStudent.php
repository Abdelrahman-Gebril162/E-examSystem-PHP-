<?php
include("../../functions/mainFunctions/conn.php");
$query = "SELECT * FROM student";
$result = $conn->query($query);
$row = $result->fetch(PDO::FETCH_ASSOC);
$res = $result->fetchAll();
echo json_encode($res);