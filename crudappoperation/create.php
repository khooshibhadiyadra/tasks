<?php
session_start();
$errors = [];
include 'conn.php';
?>
<!DOCTYPE html>
<html>

<head>

    <title>Add User</title>
</head>

<body>

    <h2>Add New User</h2>
    <form action="store.php" method="POST" enctype="multipart/form-data">
        <?php
        // var_dump($_SESSION);
        // ini_set('display_errors', 1);
        // error_reporting(E_ALL);
        if (isset($_SESSION['errors'])) {
            foreach ($_SESSION['errors'] as $field => $error) {
                // echo "<pre>";
                // print_r($field);
                // echo "</pre>";
                // echo "<p style='color:red;'>{$error}</p>"; 

            }
            // print_r($_SESSION['errors']);

        } ?>
        First Name: <input type="text" name="first_name">
        <?php if (isset($_SESSION['errors'][0])): ?>
            <p class="text-red-500"><?= $_SESSION['errors'][0] ?></p>
        <?php endif; ?>

        Last Name: <input type="text" name="last_name">
        <?php if (isset($_SESSION['errors'][1])): ?>
            <p class="text-red-500"><?= $_SESSION['errors'][1] ?></p>
        <?php endif; ?>

        Email: <input type="email" name="email">
        <?php if (isset($_SESSION['errors'][2])): ?>
            <p class="text-red-500"><?= $_SESSION['errors'][2] ?></p>
        <?php endif; ?>

        Password: <input type="password" name="password">
        <?php if (isset($_SESSION['errors'][3])): ?>
            <p class="text-red-500"><?= $_SESSION['errors'][3] ?></p>
        <?php endif; ?>

        Confirm Password: <input type="password" name="confirm_password">
        <?php if (isset($_SESSION['errors'][4])): ?>
            <p class="text-red-500"><?= $_SESSION['errors'][4] ?></p>
        <?php endif; ?>

        Phone: <input type="text" name="phone">
        <?php if (isset($_SESSION['errors'][5])): ?>
            <p class="text-red-500"><?= $_SESSION['errors'][5] ?></p>
        <?php endif; ?>

        Address: <textarea name="address"></textarea>
        <?php if (isset($_SESSION['errors'][6])): ?>
            <p class="text-red-500"><?= $_SESSION['errors'][6] ?></p>
        <?php endif; ?>

        Gender:
        <input type="radio" name="gender" value="Male"> Male
        <input type="radio" name="gender" value="Female"> Female
        <?php if (isset($_SESSION['errors'][7])): ?>
            <p class="text-red-500"><?= $_SESSION['errors'][7] ?></p>
        <?php endif; ?>

        Hobbies:
        <input type="checkbox" name="hobbies[]" value="Reading"> Reading
        <input type="checkbox" name="hobbies[]" value="Travelling"> Travelling
        <input type="checkbox" name="hobbies[]" value="Sports"> Sports
        <?php if (isset($_SESSION['errors'][8])): ?>
            <p class="text-red-500"><?= $_SESSION['errors'][8] ?></p>
        <?php endif; ?>

        Country:
        <select name="country">
            <option value="">Select</option>
            <option value="India">India</option>
            <option value="germany">germany</option>
            <option value="canada">canada</option>
        </select>
        <?php if (isset($_SESSION['errors'][9])): ?>
            <p class="text-red-500"><?= $_SESSION['errors'][9] ?></p>
        <?php endif; ?>

        Profile Image: <input type="file" name="profile_image">
        <?php if (isset($_SESSION['errors'][10])): ?>
            <p class="text-red-500"><?= $_SESSION['errors'][10] ?></p>
        <?php endif; ?>

        <button type="submit">Submit</button>
    </form>
</body>

</html>