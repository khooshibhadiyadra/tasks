<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//require_once'function.php';
require_once 'con.php';
$insertdata = new DB_CON();
if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $hobbies = $_POST['hobbies'];
    $country = $_POST['country'];
    $profile_image = $_POST['profile_image'];

    $sql = $insertdata->insert($first_name, $last_name, $email, $password, $confirm_password, $phone, $address, $gender, $hobbies, $country, $profile_image);
    if ($sql) {
        echo "<script>alert('Record inserted successfully');</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
}
