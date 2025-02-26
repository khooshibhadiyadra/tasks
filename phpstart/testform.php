<?php

$servername = "localhost"; 
$username = "root";        
$password = "admin123";    
$dbname = "userdb";        


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['create'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email_address = $_POST['email_address'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password']; 

    if ($password !== $confirm_password) {
        echo "Passwords do not match. Please try again.";
        exit; 
    }


    $password_hashed = password_hash($password, PASSWORD_DEFAULT); 

    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $gender = $_POST['gender'];
    $hobby = $_POST['hobby'];
    $country = $_POST['country'];

    $sql = "INSERT INTO users (first_name, last_name, email_address, password, address, phone_number, gender, hobby, country)
            VALUES ('$first_name', '$last_name', '$email_address', '$password_hashed', '$address', '$phone_number', '$gender', '$hobby', '$country')";

    if ($conn->query($sql) === TRUE) {
        echo "New user created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM users WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}


if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $phone_number = $_POST['phone_number'];

    $sql = "UPDATE users SET phone_number='$phone_number' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Phone number updated successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>


<h2>Registration Form</h2>
<form method="POST">
First Name:
    <input type="text" name="first_name" required><br>
Last Name:
    <input type="text" name="last_name" required><br>
Email Address: 
    <input type="email" name="email_address" required><br>
Password: 
    <input type="password" name="password" required><br>
Confirm Password:
    <input type="password" name="confirm_password" required><br>
Address:
    <input type="text" name="address"><br>
>Phone Number: 
    <input type="text" name="phone_number"><br>
Gender:
    <select name="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select><br>
Hobby: 
<input type="checkbox" name="Reading" id="read" value="reading">Reading
            <input type="checkbox" name="writing" id="write" value="writing">Writing
            <input type="checkbox" name="drawing" id="draw" value="drawing">Drawing
            <br>
Country:
<select name="country" id="country">
                <option value="India">India</option>
                <option value="Australia">Australia</option>
                <option value="South Africa">South Africa</option>
                <option value="Canada">Canada</option>
                <option value="Germany">Germany</option>
            </select>
    
    <input type="submit" name="create" value="submit">
</form>

<hr>

<h2>Users List</h2>


<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></td>
            <td><?php echo $row['email_address']; ?></td>
            <td><?php echo $row['phone_number']; ?></td>
            <td>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="text" name="phone_number" value="<?php echo $row['phone_number']; ?>" required>
                    <input type="submit" name="update" value="Update Phone">
                </form>
                
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="submit" name="delete" value="Delete" 
                    onclick="return confirm('Are you sure?')">
                </form>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

<?php
$conn->close();
?>
