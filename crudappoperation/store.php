<?php
include 'conn.php';
session_start();
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST['first_name'])) {
        $errors[] = "First name is required.";
    }
    
    if (empty($_POST['last_name'])) {
        $errors[] = "Last name is required.";
    }
    
    if (empty($_POST['email'])) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    
    if (empty($_POST['password'])) {
        $errors[] = "Password is required.";
    }
    
    if (empty($_POST['confirm_password'])) {
        $errors[] = "Confirm password is required.";
    } elseif ($_POST['password'] !== $_POST['confirm_password']) {
        $errors[] = "Passwords do not match.";
    }
    
    if (empty($_POST['phone'])) {
        $errors[] = "Phone is required.";
    }
    
    if (empty($_POST['address'])) {
        $errors[] = "Address is required.";
    }
    
    if (empty($_POST['gender'])) {
        $errors[] = "Gender is required.";
    }
    
    if (empty($_POST['hobbies'])) {
        $errors[] = "At least one hobby is required.";
    }
    
    if (empty($_POST['country'])) {
        $errors[] = "Country is required.";
    }

    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
        $profile_image = $_FILES['profile_image']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($profile_image);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES['profile_image']['tmp_name']);
        if ($check === false) {
            $errors[] = "File is not an image.";
        }

        if ($_FILES['profile_image']['size'] > 2000000) {
            $errors[] = "Sorry, your file is too large. Maximum file size is 2MB.";
        }

        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            $errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
    } else {
        $errors[] = "Profile image is required.";
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("Location: create.php");
        exit();
    }
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $gender = $_POST['gender'];
    $hobbies = implode(",", $_POST['hobbies']); 
    $country = $_POST['country'];
    $profile_image = $_FILES['profile_image']['name'];


    move_uploaded_file($_FILES['profile_image']['tmp_name'], "uploads/" . $profile_image);

    $query = "INSERT INTO users (first_name, last_name, email, password, phone, address, gender, hobbies, country, profile_image)
              VALUES ('$first_name', '$last_name', '$email', '$password', '$phone', '$address', '$gender', '$hobbies', '$country', '$profile_image')";

    if ($conn->query($query) === TRUE) {

        header("Location: index.php");
        exit();
    } else {

        echo "Error: " . $conn->error;
    }
}

