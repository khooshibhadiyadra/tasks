<?php
include 'conn.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$hobbies = implode(",", $_POST['hobbies']);
$country = $_POST['country'];
$profile_image = $_FILES['profile_image']['name'];
$target_dir = "uploads/";

if ($password !== $confirm_password) {
    die("Passwords do not match!");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format!");
}

move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_dir . $profile_image);

$query = "INSERT INTO users (first_name, last_name, email, password, phone, address, gender, hobbies, country, profile_image)
          VALUES ('$first_name', '$last_name', '$email', '$password', '$phone', '$address', '$gender', '$hobbies', '$country', '$profile_image')";

$conn->query($query);

header("Location: index.php");
?>