<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$con=mysqli_connect("localhost","root","admin123","ajax_crudtest");
$first_name = mysqli_real_escape_string($con, $_POST["first_name"]);
$last_name = mysqli_real_escape_string($con, $_POST["last_name"]);
$email = mysqli_real_escape_string($con, $_POST["email"]);
$phone=mysqli_real_escape_string($con, $_POST["phone"]);
$address = mysqli_real_escape_string($con, $_POST["address"]);
$gender=mysqli_real_escape_string($con, $_POST["gender"]);
$hobbies = implode(",", $_POST['hobbies']);
$country=mysqli_real_escape_string($con,$_POST["country"]);
// $profile_image=mysqli_real_escape_string($con,$_POST["profile_image"]);
$profile_image = $_FILES['profile_image'];
$sql = "INSERT INTO users (first_name, last_name, email,phone,address,gender,hobbies,country,profile_image) VALUES ('$first_name', '$last_name','$email','$phone','$address','$gender','$hobbies','$country','$profile_image')";
if ($con->query($sql) === TRUE) {
  echo "<script>alert('Record inserted successfully');</script>";
  echo "<script>window.location.href='index.php'</script>";
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}?>
