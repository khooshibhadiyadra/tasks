<?php
include 'conn.php';

$firstnamerr = $lastnameerr = $emailerr = $passworderr = $confirmpassworderr = $phonerr = $addresserr = $gendererr = $hobbieserr = $countryerr = $profileimageerr = "";
$first_name = $last_name = $email = $password = $confirm_password = $phone = $address = $gender = $hobbies = $country = $profile_image = "";

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
        } elseif (!preg_match('@[^\w]@', $_POST['password'])) {
            $passworderr = "Password must contain at least 1 special character.";
        } else {
            $password = test_input($_POST['password']);
        }

        if (empty($_POST['confirm_password'])) {
            $confirmpassworderr = "Confirm password is required.";
        } elseif ($_POST['password'] !== $_POST['confirm_password']) {
            $confirmpassworderr = "Passwords do not match.";
        } else {
            $confirm_password = test_input($_POST['confirm_password']);
        }


        if (empty($_POST['phone'])) {
            $phonerr = "Phone number is required.";
        } elseif (strlen($_POST['phone']) < 10) {
            $phonerr = "phone length should be more than 10 characters.";
        } else {
            $phone = test_input($_POST['phone']);
        }

        if (empty($_POST['address'])) {
            $addresserr = "Address is required.";
        } else {
            $address = test_input($_POST['address']);
        }

        if (empty($_POST['gender'])) {
            $gendererr = "Gender is required.";
        } else {
            $gender = test_input($_POST['gender']);
        }
        if (empty($_POST['hobbies'])) {
            $hobbieserr = "Hobbies are required.";
        } else {
            $hobbies = implode(",", $_POST['hobbies']);
        }
        if (empty($_POST['country'])) {
            $countryerr = "Country is required.";
        } else {
            $country = test_input($_POST['country']);
        }

        if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
            $imagequery = "SELECT profile_image FROM users WHERE email='$email'";
            $resultimage = mysqli_query($conn, $imagequery);
            $profile_image = "";
            if (mysqli_num_rows($resultimage) > 0) {
                $userimg = mysqli_fetch_assoc($resultimage);
                $profile_image = $userimg['profile_image'];
            }
            $profile_image = $_FILES['profile_image']['name'];
            $target_dir = "uploads/";
            move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_dir . $profile_image);
        } else {
            $profileimageerr = "Profile Image is required.";
        }
        if (empty($firstnamerr) && empty($lastnameerr) && empty($emailerr) && empty($passworderr) && empty($confirmpassworderr) && empty($addresserr) && empty($phonerr) && empty($emailerr) && empty($gendererr) && empty($hobbieserr) && empty($addresserr) && empty($countryerr) && empty($profileimageerr)) {
            $conn = mysqli_connect('localhost', 'root', 'admin123', 'crud_app');
            $hashedpassword = password_hash($password, PASSWORD_DEFAULT);


            $emailvalidation = "SELECT email FROM users WHERE email='$email'";
            $result = mysqli_query($conn, $emailvalidation);
            if (mysqli_num_rows($result) > 0) {
                $emailerr = "Email already exists. Please use a different email.";
            } else {

                $query = "INSERT INTO users (first_name, last_name, email, password, phone, address, gender, hobbies, country, profile_image)
                          VALUES ('$first_name', '$last_name', '$email', '$hashedpassword', '$phone', '$address', '$gender', '$hobbies', '$country', '$profile_image')";
                $conn->query($query);

                if ($query) {
                    echo "<script>alert('You have successfully registered!'); window.location='list.php';</script>";
                    exit();
                }
            }
        }
    }
}


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
