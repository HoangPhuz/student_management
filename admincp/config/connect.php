<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "student_management_web";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
}
