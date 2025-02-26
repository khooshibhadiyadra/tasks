<?php
session_start();
$firstnamerr=$lastnameerr=$emailerr=$passworderr="";
$first_name=$last_name=$email=$password="";

$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        if (empty($_POST['first_name'])) {
            $firstnamerr = "First name is required.";
        } else {
            $first_name = test_input($_POST['first_name']);
        }
        if (empty($_POST['last_name'])) {
            $lastnameerr = "Last name is required.";
        } else {
            $last_name = test_input($_POST['last_name']);
        }
        if (empty($_POST['email'])) {
            $emailerr = "Email is required.";
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $emailerr = "Invalid email format.";
        } else {
            $email = test_input($_POST['email']);
        }
        if (empty($_POST['password'])) {
            $passworderr = "Password is required.";
        } elseif (strlen($_POST['password']) <= 8) {
            $passworderr = "Password length should be more than 8 characters.";
        } elseif (!preg_match("#[0-9]+#", $_POST['password'])) {
            $passworderr = "Your password must contain at least 1 number!";
        } elseif (!preg_match("#[a-z]+#", $_POST['password'])) {
            $passworderr = "Password must contain at least 1 lowercase alphabet.";
        } elseif (!preg_match("#[A-Z]+#", $_POST['password'])) {
            $passworderr = "Password must contain at least 1 uppercase alphabet.";
        } else {
            $password = test_input($_POST['password']);
        }
        if (empty($firstnamerr) || empty($lastnameerr)|| empty($emailerr) || empty($passworderr)) {
        //     $_SESSION['errors'] = $errors;
        //     $_SESSION['old'] = $_POST;  
        //     header("Location: register.php");
        //     exit();
        // }

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

            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name'] = $last_name;


            echo "<script>alert('You have successfully registered!'); window.location='login.php';</script>";
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
            exit();
        }
    }}
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
unset($_SESSION['errors']);
unset($_SESSION['old']);

mysqli_close($conn);
