<?php
$host = "localhost";
$username = "root";
$password = "admin123";
$database = "registeration";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    echo "success";
}
