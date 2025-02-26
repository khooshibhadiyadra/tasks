<?php
session_start();
$errors = [];
include 'conn.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {

        if (empty($_POST['first_name'])) {
            $errors['first_name'] = "firstname is required.";

        }

        if (empty($_POST["last_name"])) {
            $errors['last_name'] = "lastname required";

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
            $errors['confirm_password'] = "confirmpassword required";
        }


        if (empty($_POST["phone"])) {
            $errors['phone'] = "phone required";
        }

        if (empty($_POST["address"])) {
             //sprint_r($_POST);
             $errors['address'] = "address required";
        }
        // print_r($_POST);
        // if (empty($_POST["address"])) {
        //     print_r($_POST);
        //     $errors[] = "address required";
        // }


        if (empty($_POST["gender"])) {
            $errors['gender'] = "gender required";
        }

        if (empty($_POST["hobbies"])) {
            $errors['hobby'] = "hobby is required";
        }

        if (empty($_POST["country"])) {
            $errors['country'] = "country required";
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header("location: create.php");
            exit();
        }
$id = $_POST['id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$hobbies = implode(",", $_POST['hobbies']);
$country = $_POST['country'];
$profile_image = $_FILES['profile_image']['name'];
$_SESSION['profile_image']=$profile_image;
$target_dir = "uploads/";
if ($password !== $confirm_password) {
    die("Passwords do not match!");
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format!");
}
$emailvalidation = "SELECT email FROM users WHERE email='$email'";
$result = mysqli_query($conn, $emailvalidation);
if (mysqli_num_rows($result) > 0) {
    $errors['email'] = "Email already exists. Please use a different email.";
    $_SESSION['errors'] = $errors;
    header("Location: login.php");
    exit();
}
if ($profile_image) {
    move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_dir . $profile_image);
    $query = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', email = '$email', phone = '$phone', 
              address = '$address', gender = '$gender', hobbies = '$hobbies', country = '$country', 
              profile_image = '$profile_image' WHERE id = $id";
}
else {
    $query = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', email = '$email', phone = '$phone', 
              address = '$address', gender = '$gender', hobbies = '$hobbies', country = '$country' WHERE id = $id";

if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {

} }}
// $filename= $_FILES["profile_image"]["name"];
//     $destination = "uploads/" . $_FILES["profile_image"]["name"]; 
//     move_uploaded_file($filename, $destination); //save uploaded picture in your directory

 
 //   $_SESSION['user_name6'] = $destination;
}
$conn->query($query);
header("Location: list.php");
