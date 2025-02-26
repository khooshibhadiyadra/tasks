<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
include "ajaxcon.php";

$response = ["status" => "error", "errors" => []];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'] ?? '';

    $last_name = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';

    $password = $_POST['password'] ?? '';
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $confirm_password = $_POST['confirm_password'] ?? '';
    $cphashed = password_hash($confirm_password, PASSWORD_DEFAULT);
    $address = $_POST['address'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $hobbies = isset($_POST['hobbies']) ? implode(",", $_POST['hobbies']) : '';
    $country = $_POST['country'];

    $errors = [];

    if (empty($first_name)) {
        $errors['first_name'] = "First Name is Required";
    }

    if (empty($last_name)) {
        $errors['last_name'] = "Last Name is Required";
    }

    if (empty($email)) {
        $errors['email'] = "Email is Required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }


    if (empty($password)) {
        $errors['password'] = "Password is Required";
    } elseif (strlen($password) < 8) {
        $errors['password'] = "Password should be 8 char long";
    }

    if (empty($confirm_password)) {
        $errors['confirm_password'] = "Password is required";
    } elseif ($password !== $confirm_password) {
        $errors['confirm_password'] = "Password is not match";
    }

    if (empty($address)) {
        $errors['address'] = "Address is Required";
    }

    if (empty($phone)) {
        $errors['phone'] = "Phone Number is Required";
    } elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errors['phone'] = "Phone number must be 10 digits.";
    }

    if (empty($gender)) {
        $errors['gen'] = "Gender is Required";
    }

    if (empty($hobbies)) {
        $errors['hob'] = "Hobbies is Required";
    }

    if (empty($country)) {
        $errors['country'] = "Country is Required";
    }

    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
        $imagequery = "SELECT profile_image FROM users WHERE email='$email'";
        $resultimage = mysqli_query($conn, $imagequery);
        $profile_image = "";
        if (mysqli_num_rows($resultimage) > 0) {
            $userimg = mysqli_fetch_assoc($resultimage);
            $profile_image = $userimg['profile_image'];
        }
        $profile_image = $_FILES['profile_image']['name'];
        $target_dir = "uploads/";
        move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_dir . $profile_image);
    } elseif (empty($profile_image)) {
        $errors['profile_image'] = "image is required";
    } else {
        $errors['profile_image'] = "Failed to upload the file.";
    }


    if (empty($errors)) {
        $emailvalidation = "SELECT `email` FROM `users` WHERE email='$email'";
        $result = mysqli_query($conn, $emailvalidation);
        $sql = "INSERT INTO users (first_name,last_name,email,password,confirm_password,address,phone,gender,hobbies,country,profile_image)
             VALUES('$first_name','$last_name','$email','$hashed','$cphashed','$address','$phone','$gender','$hobbies','$country','$profile_image')";

        if (mysqli_query($conn, $sql)) {
            $response = ["status" => "success", "message" => "Data Inserted."];
        } else {
            $response = ["status" => "error", "message" => "Database error: " . mysqli_error($conn)];
        }
    } else {
        $response["errors"] = $errors;
    }
}
echo json_encode($response);
