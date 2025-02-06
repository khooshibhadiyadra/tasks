<?php
include 'oopcon.php';

$updatedata = new DB_CON();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$first_name = $last_name = $email = $phone = $address = $gender = $hobbies = $country = $profile_image = "";
$error=[];
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    echo "<pre>";
    print_r($_FILES);
        echo "<pre>";
    print_r($_POST);
    if (isset($_POST['update'])) {

        if (empty($_POST['first_name'])) {
            $error['first_name'] = "First name is required.";
        } else {

            $first_name = test_input($_POST['first_name']);
        }

        if (empty($_POST["last_name"])) {
            $error['last_name'] = "Last name is required.";
        } else {
            $last_name = test_input($_POST['last_name']);
        }

        if (empty($_POST['email'])) {
            $error['email'] = "Email is required.";
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error['email'] = "Invalid email format.";
        } else {
            $email = test_input($_POST['email']);
        }
        if (empty($_POST['phone'])) {
            $error['phone'] = "Phone number is required.";
        } elseif (strlen($_POST['phone']) < 10) {
            $error['phone'] = "phone length should be more than 10 digits.";
        } else {
            $phone = test_input($_POST['phone']);
        }
        if (empty($_POST["address"])) {
            $error['address'] = "Address is required.";
        } else {
            $address = test_input($_POST['address']);
        }

        if (empty($_POST["gender"])) {
            $error['gender'] = "Gender is required.";
        } else {
            $gender = test_input($_POST['gender']);
        }

        if (empty($_POST["hobbies"])) {
            $error['hobbies'] = "Hobbies are required.";
        } else {
            $hobbies = test_input($_POST['hobbies']);
        }

        if (empty($_POST["country"])) {
            $error['country'] = "Country is required.";
        } else {
            $country = test_input($_POST['country']);
        }
        if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
            $profile_image = $_FILES['profile_image']['name'];
            $target_dir = "uploads/";
            move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_dir . $profile_image);
        } else {
            $error['profile_image'] = "No file uploaded to update.";
        }

        if(empty($error)){
//            $id = $_POST['id'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $gender = $_POST['gender'];
            $hobbies = implode(",", $_POST['hobbies']);
            $country = $_POST['country'];
            $profile_image = $_FILES['profile_image']['name'];
            $target_dir = "uploads/";
            move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_dir . $profile_image);
            $sql = $updatedata->update($first_name, $last_name, $email, $phone, $address, $gender, $hobbies, $country, $profile_image, $id);

            echo "<script>alert('updated successfully')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
    }
}

function test_input($data)
{
   $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
