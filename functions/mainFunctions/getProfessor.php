<?php

include "conn.php";
extract($_GET);
$return_arr = array();

$query = "SELECT * FROM professor where fname != 'master' and faculty_id='$id'";

$result = $conn->query($query);

while($row = $result->fetch(PDO::FETCH_ASSOC)){
    $id = $row['id'];
    $name = $row['fname']." ".$row['lname'];
    $return_arr[] = array("id" => $id,
                    "name" => $name,);
}

// Encoding array in JSON format
echo json_encode($return_arr);