<?php

session_start();
$errors = [];

$emailerr=$passworderr="";
$email=$password="";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['submit'])) {

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

        if (empty($emailerr) || empty($passworderr)) {
        // if (!empty($errors)) {
        //     $_SESSION['errors'] = $errors;
        //     $_SESSION['old'] = $_POST;  
        //     header("location: login.php");
        //     exit();
        // }

        $conn = mysqli_connect('localhost', 'root', 'admin123', 'crud_app');
        if (!$conn) {
            die('Could not connect to MySQL: ' . mysqli_connect_error());
        }
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        function checkLogin($conn, $email, $password)
        {
            $query = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                if (password_verify($password, $row['password'])) {
                    return $row;
                }
            }
            return false;
        }

        $user = checkLogin($conn, $email, $password);
        if ($user) {
            $_SESSION['email'] = $email;

            if ($email === 'khooshi@gmail.com') {
                echo "<script>alert('Login successful! Redirecting to admin page.'); window.location='dashboard.php';</script>";
                exit();
            } else {
                echo "<script>alert('Login successful!'); window.location='dashboard.php';</script>";
                exit();
            }
        } else {

            echo "<script>alert('Login not successful! Please check your email or password.'); window.location='login.php';</script>";
        }
    }
}}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
unset($_SESSION['errors']);
unset($_SESSION['old']);