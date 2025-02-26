<?php
require_once 'conn.php';
$updatedata = new DB_con();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$first_name = $last_name = $email = $gender = $language = $subject = $profile_image= "";
$error = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    if (empty($_POST['first_name'])) {
        
        $error['first_name'] = "First name is required.";    
    } else {

        $first_name = inputfunction($_POST['first_name']);
    }

    if (empty($_POST["last_name"])) {
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
   

    if (empty($_POST["gender"])) {
        $error['gender'] = "Gender is required.";
    } else {
        $gender = inputfunction($_POST['gender']);
    }
    if (empty($_POST["language"])) {
        $error['language'] = "language is required.";
    } else {
        $language = inputfunction($_POST['language']);
    }

    if (empty($_POST["subject"])) {
        $error['subject'] = "subject are required.";
    } else {
        $subject = implode(",", $_POST['subject']);
    }


}
if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
    $profile_image = $_FILES['profile_image']['name'];
    $target_dir = "uploads/";
    move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_dir . $profile_image);
} else {
    $error['profile_image'] = "click to upload new image.";
}

if (empty($error)) {
    $updatedata = new DB_con();
    if (isset($_POST['update'])) {
        
        $id = $_GET['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];

        $gender = $_POST['gender'];
        $language = $_POST['language'];
        $subject = implode(",", $_POST['subject']);
     
        $profile_image = $_FILES['profile_image']['name'];
        $target_dir = "uploads/";
        
        $sql = $updatedata->update($first_name, $last_name, $email, $gender, $subject, $language, $profile_image, $id);

        move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_dir . $profile_image);
        if ($sql) {
            echo "<script>alert('updated successfully')</script>";
            echo "<script>window.location.href='index.php'</script>";
        } else {
            echo "<script>alert('error')</script>";
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