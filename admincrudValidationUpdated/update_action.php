<?php
include 'conn.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        
        if (empty($_POST['first_name'])) {
            $errors['first_name'] = "First name is required.";
        }

        if (empty($_POST["last_name"])) {
            $errors['last_name'] = "Last name is required.";
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
            $errors['confirm_password'] = "Confirm password is required.";
        } elseif ($_POST['password'] !== $_POST['confirm_password']) {
            $errors['confirm_password'] = "Passwords do not match.";
        }

        if (empty($_POST["phone"])) {
            $errors['phone'] = "Phone number is required.";
        }

        if (empty($_POST["address"])) {
            $errors['address'] = "Address is required.";
        }

        if (empty($_POST["gender"])) {
            $errors['gender'] = "Gender is required.";
        }

        if (empty($_POST["hobbies"])) {
            $errors['hobbies'] = "Hobbies are required.";
        }

        if (empty($_POST["country"])) {
            $errors['country'] = "Country is required.";
        }
        if (empty($_POST["profile_image"])) {
            $errors['profile_image'] = "profile image is required.";
        }


        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            // // $_SESSION['old'] = $_POST;  
            // header("Location: list.php");
            // exit();
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
$target_dir = "uploads/";
if ($profile_image) {

    move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_dir . $profile_image);
    $query = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', email = '$email', phone = '$phone', 
              address = '$address', gender = '$gender', hobbies = '$hobbies', country = '$country', 
              profile_image = '$profile_image' WHERE id = $id";

} else {
    $query = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', email = '$email', phone = '$phone', 
              address = '$address', gender = '$gender', hobbies = '$hobbies', country = '$country' WHERE id = $id";

if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
    $_SESSION['fullimage'] = file_get_contents($_FILES['profile_image']['tmp_name']);
    $_SESSION['profile_image']['name'] = $_FILES['profile_image']['name'];
    echo "Image uploaded and saved in session!";
} else {
    echo "No file uploaded or there was an error with the file.";
}
}}}
$conn->query($query);
header("Location: list.php");