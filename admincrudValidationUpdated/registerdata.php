<?php
session_start();
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        if (empty($_POST['first_name'])) {
            $errors['first_name'] = "Firstname is required.";
        }
        if (empty($_POST["last_name"])) {
            $errors['last_name'] = "Lastname is required.";
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
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $_POST;  
            header("Location: register.php");
            exit();
        }
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

        $conn = mysqli_connect('localhost', 'root', 'admin123', 'crud_app');
        if (!$conn) {
            die('Could not connect to MySQL: ' . mysqli_connect_error());
        }
        $emailvalidation = "SELECT email FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $emailvalidation);
        if (mysqli_num_rows($result) > 0) {
            $errors['email'] = "Email already exists. Please use a different email.";
            $_SESSION['errors'] = $errors;
            header("Location: register.php");
            exit();
        }
        $insert = "INSERT INTO users (first_name, last_name, email, password) 
                   VALUES ('$first_name', '$last_name', '$email', '$hashedpassword')";
        $insert_result = mysqli_query($conn, $insert);


        if ($insert_result) {

            // $_SESSION['first_name'] = $first_name;
            // $_SESSION['last_name'] = $last_name;


            echo "<script>alert('You have successfully registered!'); window.location='dashboard.php';</script>";
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
            exit();
        }
    }
}
unset($_SESSION['errors']);
unset($_SESSION['old']);

mysqli_close($conn);
