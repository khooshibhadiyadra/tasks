<?php
session_start();
include 'conn.php';
include 'header.php';
include 'sidebar.php';
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email']; 

$query="SELECT first_name,last_name FROM users WHERE email='$email'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $user = $result->fetch_assoc();
        $first_name = $user['first_name'];
        $last_name = $user['last_name'];     
        echo "Hello, " . $first_name . " " . $last_name;
}
    else {
        echo "User not found.";
    }
} else {
    echo "Please log in.";
    exit;
}
include 'footer.php';