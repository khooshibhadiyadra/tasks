<?php
   session_start();
   $errors = [];
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        if (empty($_POST["email"])) {
            $errors[] = "email required";
        }
        if (empty($_POST["password"])) {
            $errors[] = "password required";
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
        $hashedpassword=password_hash($password,PASSWORD_DEFAULT);
        function checkLogin($conn, $table, $email, $password)
        {
            $hashedpassword=password_hash($password,PASSWORD_DEFAULT);
            $query = "SELECT * FROM $table WHERE email = '$email' AND password = '$hashedpassword'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                return $row;
            }
            return false;
        }
        if (checkLogin($conn, 'users', $email, $password)) {
            $_SESSION['email'] = $email;
            if ($email === 'khooshi@gmail.com' && $password === '123') {

                echo "<script>alert('Login successful! Redirecting to admin page.'); window.location='list.php';</script>";
                exit();
            } else {
                echo "<script>alert('Login successful!'); window.location='list.php';</script>";
                exit();
            }
        }
        echo "<script>alert('Incorrect email or password. Please try again.');</script>";
    }}
    ?>