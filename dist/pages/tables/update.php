<?php
include 'conn.php';
$id = $_GET['id'];

$query = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($query);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<style>
    .card-primary:not(.card-outline)>.card-header {
    background-color: #007bff;
    color:white;
    --font-family-sans-serif: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
}
.form-group{
    font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
}
.form-control {
    display: block;
    width: 100%;
    height: calc(2.25rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    box-shadow: inset 0 0 0 transparent;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}
.card-primary:not(.card-outline)>.card-header {
    background-color: #007bff;
    color: white;
    --font-family-sans-serif: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
    height: 36px
font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
.btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
    box-shadow: none;
}
</style>
    <title>Update User</title>
</head>
<body>
<div class="card card-primary">
<div class="card-header">
    <h2 class="card-title">Update User</h2>
</div>
<div class="card-body">
    <form action="update_action.php" method="POST" enctype="multipart/form-data">
    
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <div class="form-group">
        First Name: 
        
        <input class="form-control" type="text" name="first_name" value="<?php echo $user['first_name']; ?>" required><br>
        </div>
        <div class="form-group">
        Last Name: <input class="form-control" type="text" name="last_name" value="<?php echo $user['last_name']; ?>" required><br>
        Email: <input type="email" name="email" value="<?php echo $user['email']; ?>" required><br>
        Phone: <input type="text" name="phone" value="<?php echo $user['phone']; ?>" required><br>
        Address: <textarea name="address" required><?php echo $user['address']; ?></textarea><br>
        Gender: 
        <input type="radio" name="gender" value="Male" <?php if ($user['gender'] == 'Male') echo 'checked'; ?> required> Male
        <input type="radio" name="gender" value="Female" <?php if ($user['gender'] == 'Female') echo 'checked'; ?> required> Female<br>
        Hobbies: 
        <input type="checkbox" name="hobbies[]" value="Reading" <?php if (strpos($user['hobbies'], 'Reading') !== false) echo 'checked'; ?>> Reading
        <input type="checkbox" name="hobbies[]" value="Travelling" <?php if (strpos($user['hobbies'], 'Travelling') !== false) echo 'checked'; ?>> Travelling
        <input type="checkbox" name="hobbies[]" value="Sports" <?php if (strpos($user['hobbies'], 'Sports') !== false) echo 'checked'; ?>> Sports<br>
        Country: 
        <select name="country" required>
            <option value="India" <?php if ($user['country'] == 'India') echo 'selected'; ?>>India</option>
            <option value="germany" <?php if ($user['country'] == 'germany') echo 'selected'; ?>>germany</option>
            <option value="canada" <?php if ($user['country'] == 'canada') echo 'selected'; ?>>canada</option>
        </select><br>
        Profile Image: <input type="file" name="profile_image"><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>