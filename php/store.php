<?php
include 'conn.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$insertdata = new DB_CON();

$first_name = $last_name = $email = $password = $confirm_password = $gender = $language = $subject = $profile_image = "";
$error = [];

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
    if (empty($_POST['first_name'])) {
        $error['first_name'] = "First name is required.";

    } else {
        $first_name = inputfunction($_POST['first_name']);
    }
    if (empty($_POST['last_name'])) {
        $error['last_name'] = "Last name is required.";
    } else {
        $last_name = inputfunction($_POST['last_name']);
    }
    if (empty($_POST['email'])) {
        $error['email'] = "Email is required.";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "Invalid email format.";
    } else {
        $email = inputfunction($_POST['email']);
    }

    if (empty($_POST['password'])) {
        $error['password'] = "Password is required.";
    } elseif (strlen($_POST['password']) <= 8) {
        $error['password'] = "Password length should be more than 8 characters.";
    } elseif (!preg_match("#[0-9]+#", $_POST['password'])) {
        $error['password'] = "Your password must contain at least 1 number!";
    } elseif (!preg_match("#[a-z]+#", $_POST['password'])) {
        $error['password'] = "Password must contain at least 1 lowercase alphabet.";
    } elseif (!preg_match("#[A-Z]+#", $_POST['password'])) {
        $error['password'] = "Password must contain at least 1 uppercase alphabet.";
    }elseif (!preg_match('@[^\w]@', $_POST['password'])) {
        $error['password'] = "Password must contain at least 1 special character.";
    }
     else {
        $password = inputfunction($_POST['password']);
    }

    if (empty($_POST['confirm_password'])) {
        $error['confirm_password'] = "Confirm password is required.";
    } elseif ($_POST['password'] !== $_POST['confirm_password']) {
        $error['confirm_password'] = "Passwords do not match.";
    } else {
        $confirm_password = inputfunction($_POST['confirm_password']);
    }
    
    if(empty($_POST['language'])){
        $error['language'] = "language is Required";
    }else{
        $language=inputfunction($_POST['language']);
    }
    if (empty($_POST['gender'])) {
        $error['gender'] = "Gender is required.";
    } else {
        $gender = inputfunction($_POST['gender']);
    }

   
    if(empty($_POST['subject'])){
        $error['subject'] = "At Least one subject is Required";
    }else {
        $subject = implode(",", $_POST['subject']);
    }


    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
        $profile_image = $_FILES['profile_image']['name'];
        $target_dir = "uploads/";
        move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_dir . $profile_image);
    } else {
        $error['profile_image'] = "Profile Image is required.";
    }


if(empty($error)){

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
    $hashedpassword2 = password_hash($confirm_password, PASSWORD_DEFAULT);
    $language = $_POST['language'];
    $subject = implode(",", $_POST['subject']);
  
    $profile_image=$FILES['profile_image'];
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
        $profile_image = $_FILES['profile_image']['name'];
        $target_dir = "uploads/";
        move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_dir . $profile_image);
    } else {
        $error['profile_image'] = "Profile Image is required.";
    }
}
    $sql = $insertdata->insert($first_name, $last_name, $email, $hashedpassword, $hashedpassword2, $gender, $language, $subject, $profile_image);
    if ($sql) {
        echo "<script>alert('Record inserted successfully');</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
}
    
}
function inputfunction($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}