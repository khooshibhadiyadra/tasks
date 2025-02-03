<?php
session_start();
$errors = [];
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {

        
        if (empty($_POST['first_name'])) {
            $errors['first_name'] = "First name is required.";
        }

        if (empty($_POST["last_name"])) {
            $errors['last_name'] = "Last name is required.";
        }

        if (empty($_POST['email'])) {
            $errors['email'] = "Email is required.";
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format.";
        }

        if (empty($_POST["password"])) {
            $errors['password'] = "Password is required.";
        } elseif (strlen($_POST['password']) <= 8) {
            $errors['password'] = "Password length should be more than 8 characters.";
        } elseif (!preg_match("#[0-9]+#", $_POST['password'])) {
            $errors['password'] = "Your password must contain at least 1 number!";
        } elseif (!preg_match("#[a-z]+#", $_POST['password'])) {
            $errors['password'] = "Password must contain at least 1 lowercase alphabet.";
        } elseif (!preg_match("#[A-Z]+#", $_POST['password'])) {
            $errors['password'] = "Password must contain at least 1 uppercase alphabet.";
        }

        if (empty($_POST["confirm_password"])) {
            $errors['confirm_password'] = "Confirm password is required.";
        } elseif ($_POST['password'] !== $_POST['confirm_password']) {
            $errors['confirm_password'] = "Passwords do not match.";
        }

        if (empty($_POST["phone"])) {
            $errors['phone'] = "Phone number is required.";
        }

        if (empty($_POST["address"])) {
            $errors['address'] = "Address is required.";
        }

        if (empty($_POST["gender"])) {
            $errors['gender'] = "Gender is required.";
        }

        if (empty($_POST["hobbies"])) {
            $errors['hobbies'] = "Hobbies are required.";
        }

        if (empty($_POST["country"])) {
            $errors['country'] = "Country is required.";
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $_POST;  
            header("Location: create.php");
            exit();
        }

   
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
        $confirm_password = $_POST['confirm_password'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $hobbies = implode(",", $_POST['hobbies']);
        $country = $_POST['country'];
        $profile_image = $_FILES['profile_image']['name'];
        $target_dir = "uploads/";

        move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_dir . $profile_image);


        $emailvalidation = "SELECT email FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $emailvalidation);
        if (mysqli_num_rows($result) > 0) {
            $errors['email'] = "Email already exists. Please use a different email.";
            $_SESSION['errors'] = $errors;
            header("Location: create.php");
            exit();
        }

  
        $query = "INSERT INTO users (first_name, last_name, email, password, phone, address, gender, hobbies, country, profile_image)
                  VALUES ('$first_name', '$last_name', '$email', '$hashedpassword', '$phone', '$address', '$gender', '$hobbies', '$country', '$profile_image')";

        $conn->query($query);

        unset($_SESSION['errors']);
        unset($_SESSION['old']);

        header("Location: list.php");
    }
}
