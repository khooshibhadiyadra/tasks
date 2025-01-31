<?php
session_start();
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        if (empty($_POST["email"])) {
            $errors[] = "Email is required.";
        }
        if (empty($_POST["password"])) {
            $errors[] = "Password is required.";
        }
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header("location: login.php");
            exit();
        }
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
                echo "<script>alert('Login successful! Redirecting to admin page.'); window.location='list.php';</script>";
                exit();
            } else {
                echo "<script>alert('Login successful!'); window.location='list.php';</script>";
                exit();
            }
        } else {

            echo "<script>alert('Login not successful! Please check your email or password.'); window.location='login.php';</script>";
        }
    }
}
