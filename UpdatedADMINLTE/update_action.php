<?php
include 'conn.php';
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
}
$conn->query($query);
header("Location: list.php");
