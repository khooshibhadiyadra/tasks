<!DOCTYPE html>
<html>
<head>

    <title>Add User</title>
</head>
<body>

    <h2>Add New User</h2>
    <form action="store.php" method="POST" enctype="multipart/form-data">
        First Name: <input type="text" name="first_name" required><br>
        Last Name: <input type="text" name="last_name" required><br>
        Email: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        Confirm Password: <input type="password" name="confirm_password" required><br>
        Phone: <input type="text" name="phone" required><br>
        Address: <textarea name="address" required></textarea><br>
        Gender: 
        <input type="radio" name="gender" value="Male" required> Male
        <input type="radio" name="gender" value="Female" required> Female<br>
        Hobbies: 
        <input type="checkbox" name="hobbies[]" value="Reading"> Reading
        <input type="checkbox" name="hobbies[]" value="Travelling"> Travelling
        <input type="checkbox" name="hobbies[]" value="Sports"> Sports<br>
        Country: 
        <select name="country" required>
            <option value="">Select</option>
            <option value="India">India</option>
            <option value="germany">germany</option>
            <option value="canada">canada</option>
        </select><br>
        Profile Image: <input type="file" name="profile_image" required><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
