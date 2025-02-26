<?php
$con = mysqli_connect("localhost", "root", "admin123", "ajax_crudtest");
$id = $_GET['id'];
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$query = "SELECT * FROM users WHERE id = '$id'";
$result = $con->query($query);
$firstnamerr = $lastnameerr = $emailerr  = $phonerr = $addresserr = $gendererr = $hobbieserr = $countryerr = $profileimageerr = "";
$first_name = $last_name = $email  = $password = $confirm_password = $phone = $address = $gender = $hobbies = $country = $profile_image = "";
$con = mysqli_connect("localhost", "root", "admin123", "ajax_crudtest");
$first_name = mysqli_real_escape_string($con, $_POST["first_name"]);
$last_name = mysqli_real_escape_string($con, $_POST["last_name"]);
$email = mysqli_real_escape_string($con, $_POST["email"]);
$phone = mysqli_real_escape_string($con, $_POST["phone"]);
$address = mysqli_real_escape_string($con, $_POST["address"]);
$gender = $_POST['gender'];
$hobbies = implode(",", $_POST['hobbies']);
$country = mysqli_real_escape_string($con, $_POST["country"]);
// $profile_image=mysqli_real_escape_string($con,$_FILES["profile_image"]);
// $profile_image = $_FILES['profile_image'];
// echo "<pre>";
// print_r($_FILES);
$sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', email = '$email', phone = '$phone', 
      address='$address',gender='$gender', hobbies='$hobbies',country='$country' WHERE id = '$id'";
$con->query($query);
if ($query ==TRUE) {
    echo " <script>alert('You have successfully updated!'); window.location='list.php';</script>";
}
else{
    echo "error";
}
