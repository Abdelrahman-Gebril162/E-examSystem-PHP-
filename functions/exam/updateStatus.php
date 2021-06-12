<?php 
include("../../functions/mainFunctions/conn.php");
extract($_POST);
$updateExam = $conn->query("UPDATE exam
                            SET status='$state'
                            WHERE id='$id'");
 ?>