<?php

include "conn.php";

$return_arr = array();

$query = "SELECT * FROM faculty";

$result = $conn->query($query);

while($row = $result->fetch(PDO::FETCH_ASSOC)){
    $id = $row['id'];
    $name = $row['name'];
    $level = $row['levelsNum'];
    $return_arr[] = array("id" => $id,
                    "name" => $name,
                "level"=>$level);
}

// Encoding array in JSON format
echo json_encode($return_arr);