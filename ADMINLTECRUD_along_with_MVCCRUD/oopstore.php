<?php
require_once 'oopcon.php';
$insertdata = new DB_CON();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$first_name = $last_name = $email = $password = $confirm_password = $phone = $address = $gender = $hobbies = $country = $profile_image = "";
$error = [];
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
    echo "<pre>";
    print_r($_POST);
    if (empty($_POST['first_name'])) {
        $error['first_name'] = "First name is required.";
    } else {
        $first_name = test_input($_POST['first_name']);
    }
    if (empty($_POST['last_name'])) {
        $error['last_name'] = "Last name is required.";
    } else {
        $last_name = test_input($_POST['last_name']);
    }
    if (empty($_POST['email'])) {
        $error['email'] = "Email is required.";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "Invalid email format.";
    } else {
        $email = test_input($_POST['email']);
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
        $password = test_input($_POST['password']);
    }

    if (empty($_POST['confirm_password'])) {
        $error['confirm_password'] = "Confirm password is required.";
    } elseif ($_POST['password'] !== $_POST['confirm_password']) {
        $error['confirm_password'] = "Passwords do not match.";
    } else {
        $confirm_password = test_input($_POST['confirm_password']);
    }
    

    if (empty($_POST['address'])) {
        $error['address'] = "Address is required.";
    } else {
        $address = test_input($_POST['address']);
    }

    if (empty($_POST['phone'])) {
        $error['phone'] = "Phone number is required.";
    } elseif (strlen($_POST['phone']) < 10) {
        $error['phone'] = "phone length should be more than 10 characters.";
    } else {
        $phone = test_input($_POST['phone']);
    }

    if (empty($_POST['gender'])) {
        $error['gender'] = "Gender is required.";
    } else {
        $gender = test_input($_POST['gender']);
    }

   
    if (empty($_POST['hobbies'])) {
        $error['hobbies'] = "Hobbies are required.";
    } else {
        $hobbies = implode(",", $_POST['hobbies']);
    }

    if(empty($_POST['country'])){
        $error['country'] = "Country is Required";
    }else{
        $country=test_input($_POST['country']);
    }
}
 if (!empty($_FILES["profile_image"]["name"])) {
        $profile_image = $_FILES["profile_image"]["name"];
        $tempname = $_FILES["profile_image"]["tmp_name"];
        $folder = "./uploads/" .$profile_image;

    if (move_uploaded_file($tempname, $folder)) {
            $error = "error";
        } else {
            $error['profile_image'] = "Error uploading file";
        }
        } else {
            $error['profile_image'] = "File is Required";
        }


if(empty($error)){
    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = $insertdata->insert($first_name , $last_name , $email , $hashedpassword , $confirm_password ,$phone , $address , $gender , $hobbies , $country , $profile_image);
    if($sql){
        echo "<script>alert('Data inserted');</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
    
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
