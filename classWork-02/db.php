<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "employee_php";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}
?>