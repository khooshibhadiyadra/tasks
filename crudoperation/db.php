<?php
$host = 'localhost';
$username = 'root';
$password = 'admin123';  // Replace with your password if needed
$dbname = 'test';  // Replace with your database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
