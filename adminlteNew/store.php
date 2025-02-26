<?php
session_start();
$errors = [];

include 'conn.php';

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

        if (empty($_POST["confirm_password"])) {
            $errors[] = "confirmpassword required";
        }


        if (empty($_POST["phone"])) {
            $errors[] = "phone required";
        }

        if (empty($_POST["address"])) {
             //sprint_r($_POST);
             $errors[] = "address required";
        }
        // print_r($_POST);
        // if (empty($_POST["address"])) {
        //     print_r($_POST);
        //     $errors[] = "address required";
        // }


        if (empty($_POST["gender"])) {
            $errors[] = "gender required";
        }

        if (empty($_POST["hobbies"])) {
            $errors[] = "hobby is required";
        }

        if (empty($_POST["country"])) {
            $errors[] = "country required";
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header("location: create.php");
            exit();
        }



        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashedpassword=password_hash($password,PASSWORD_DEFAULT);
        $confirm_password = $_POST['confirm_password'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $hobbies = implode(",", $_POST['hobbies']);
        $country = $_POST['country'];
        $profile_image = $_FILES['profile_image']['name'];
        $target_dir = "uploads/";
        if ($password !== $confirm_password) {
            die("Passwords do not match!");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Invalid email format!");
        }
        move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_dir . $profile_image);
        $query = "INSERT INTO users (first_name, last_name, email, password, phone, address, gender, hobbies, country, profile_image)
          VALUES ('$first_name', '$last_name', '$email', '$hashedpassword', '$phone', '$address', '$gender', '$hobbies', '$country', '$profile_image')";
    }
    $conn->query($query);
}
    // header("Location: list.php");

