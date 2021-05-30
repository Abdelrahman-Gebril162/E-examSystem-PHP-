<?php

include "conn.php";
$facultyid= $_GET['id'];
$return_arr = array();

$query = "SELECT t1.id,t1.name,t2.levelsNum FROM department AS t1 INNER JOIN faculty AS t2 ON t1.faculty_id = t2.id where t1.faculty_id = $facultyid";

$result = $conn->query($query);

while($row = $result->fetch(PDO::FETCH_ASSOC)){
    $id = $row['id'];
    $name = $row['name'];
    $level = $row['levelsNum'];
    $return_arr[] = array("id" => $id,
                    "name" => $name,
                "level" => $level);
}

// Encoding array in JSON format
echo json_encode($return_arr);