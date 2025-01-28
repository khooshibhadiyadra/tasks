<?php
session_start();

$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        if (empty($_POST['first_name'])) {
            $errors[] = "firstname is required.";
        }
        if (empty($_POST["last_name"])) {
            $errors[] = "lastname required";
        }
        if (empty($_POST['email'])) {
            $errors[] = "Email is required.";
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }
        if (empty($_POST["password"])) {
            $errors[] = "password required";
        }
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header("location: register.php");
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
        $insert = "INSERT INTO users (first_name,last_name,email,password) VALUES ('$first_name','$last_name','$email','$hashedpassword')";
        $result = mysqli_query($conn, $insert);
        if ($result) {
            echo "<script>alert('You have successfully registered!'); window.location='list.php';</script>";
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
mysqli_close($conn);
