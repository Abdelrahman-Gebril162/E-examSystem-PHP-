<?php 

$host = "localhost";
$user = "root";
$pass = "";
$db   = "examdb";
$conn = null;

try {
  $conn = new PDO("mysql:host={$host};dbname={$db};",$user,$pass);
} catch (Exception $e) {
  echo "connnection failed ". $e->getMessage(); 
}