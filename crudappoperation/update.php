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
    <title>Update User</title>
</head>
<body>
    <h2>Update User</h2>
    <form action="update_action.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        First Name: <input type="text" name="first_name" value="<?php echo $user['first_name']; ?>" required><br>
        Last Name: <input type="text" name="last_name" value="<?php echo $user['last_name']; ?>" required><br>
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