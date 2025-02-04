<?php
include 'conn.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$firstnamerr = $lastnameerr = $emailerr = $passworderr = $confirmpassworderr = $phonerr = $addresserr = $gendererr = $hobbieserr = $countryerr = $profileimageerr = "";
$first_name = $last_name = $email  = $password = $confirm_password = $phone = $address = $gender = $hobbies = $country = $profile_image = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {

        if (empty($_POST['first_name'])) {
            $firstnamerr = "First name is required.";

        } else {

            $first_name = test_input($_POST['first_name']);
        }

        if (empty($_POST["last_name"])) {
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

        if (empty($_POST["phone"])) {
            $phonerr = "Phone number is required.";
        } else {
            $phone = test_input($_POST['phone']);
        }

        if (empty($_POST["address"])) {
            $addresserr = "Address is required.";
        } else {
            $address = test_input($_POST['address']);
        }

        if (empty($_POST["gender"])) {
            $gendererr = "Gender is required.";
        } else {
            $gender = test_input($_POST['gender']);
        }

        if (empty($_POST["hobbies"])) {
            $hobbieserr = "Hobbies are required.";
        } else {
            $hobbies = test_input($_POST['address']);
        }

        if (empty($_POST["country"])) {
            $countryerr = "Country is required.";
        } else {
            $country = test_input($_POST['address']);
        }

        // if (empty($_POST["profile_image"])) {
        //     $profileimageerr = "profile image is required.";
        // }
        // else{
        //     $profile_image=test_input($_POST['profile_image']);
        // }
        if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
            $profile_image = $_FILES['profile_image']['name'];
            $target_dir = "uploads/";
            move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_dir . $profile_image);
        } else {
            $profileimageerr = "No file uploaded to update or already image is uploaded.";
        }


        // if (!empty($errors)) {
        //     $_SESSION['errors'] = $errors;
        //     // // $_SESSION['old'] = $_POST;  
        //     // header("Location: list.php");
        //     // exit();
        // }
        if (empty($firstnamerr) || empty($lastnameerr) || empty($emailerr) || empty($password) || empty($confirm_password) || empty($address) || empty($phone) || empty($email) || empty($gender) || empty($hobbies) || empty($address) || empty($country) || empty($profile_image)) {
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
                          address = '$address', country = '$country', 
                          profile_image = '$profile_image' WHERE id = $id";
            } else {
                $query = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', email = '$email', phone = '$phone', 
                          address = '$address',country = '$country' WHERE id = $id";

                if (!empty($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
                    $_SESSION['fullimage'] = file_get_contents($_FILES['profile_image']['tmp_name']);
                    $_SESSION['profile_image']['name'] = $_FILES['profile_image']['name'];
                    echo "Image uploaded and saved in session!";
                } else {
                    echo "No file uploaded or there was an error with the file.";
                }
            }
        }
    }

    $conn->query($query);
    // header("Location: list.php");
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
