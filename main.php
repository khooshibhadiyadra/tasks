<?php
$servername = "localhost";
$username = "root";
$password = "admin123";
$database = "themeform";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['create'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email_address'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $hobbies = isset($_POST['hobby']) ? implode(",", $_POST['hobby']) : '';
    $country = $_POST['country'];
    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
        exit;
    }
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);
 $sql = "INSERT INTO dataregisteration (first_name, last_name, email_address, password, phone_number, 
 address, gender, hobby, country)
VALUES ('$first_name', '$last_name', '$email', '$password_hashed', '$phone_number', '$address', 
'$gender', '$hobbies', '$country')";
    if ($conn->query($sql) === TRUE) {
        echo "New user registered successfully.";

    } else {
        echo "Error:".$sql."<br>".$conn->error;
    }
 
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $phone_number = $_POST['phone_number'];
$sql = "UPDATE dataregisteration SET phone_number = '$phone_number' WHERE id = $id";
if ($conn->query($sql) === TRUE) {
        echo "Phone number updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}?>


<!-- 
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM dataregisteration WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}$sql = "SELECT * FROM dataregisteration";
       $result = $conn->query($sql);
?> 
<html lang="en">
<head>
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .form {
            padding-left: 367px;
            padding-top: 96px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        input[type="submit"] {
            cursor: pointer;
        }
    </style>
</head>
<body>

<!-- <div class="form">
    <h1>Registration Form</h1>
    <form method="POST" action="main.php">
        <label>First Name:</label>
        <input type="text" name="first_name" required><br>
        <label>Last Name:</label>
        <input type="text" name="last_name" required><br>
        <label>Email Address:</label>
        <input type="email" name="email_address" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <label>Confirm Password:</label>
        <input type="password" name="confirm_password" required><br>
        <label>Address:</label>
        <input type="text" name="address"><br>
        <label>Phone Number:</label>
        <input type="text" name="phone_number"><br>
        <label>Gender:</label>
        <input type="radio" name="gender" value="Female">Female
        <input type="radio" name="gender" value="Male">Male
        <br>
        <label>Hobbies:</label>
<input type="checkbox" name="hobby[]" value="reading">Reading
<input type="checkbox" name="hobby[]" value="writing">Writing
<input type="checkbox" name="hobby[]" value="drawing">Drawing
        <br>
        <label>Country:</label>
        <select name="country">
<option value="India">India</option>
<option value="Australia">Australia</option>
<option value="South Africa">South Africa</option>
<option value="Canada">Canada</option>
<option value="Germany">Germany</option>
</select><br>
        <input type="submit" name="create" value="Submit">
    </form>
    <h2>Users List</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Actions</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['email_address']; ?></td>
                    <td><?php echo $row['phone_number']; ?></td>
                    <td> 
                    <form method="POST" action="main.php" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="text" name="phone_number" value="<?php echo $row['phone_number']; ?>" required>
                    <input type="submit" name="update" value="Update Phone">
                        </form>
                <form method="POST" action="main.php" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure you want to delete this user?')">
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">No users found.</td>
            </tr>
        <?php endif; ?>
    </table>
</div> -->
</body>
</html>
<?php
$conn->close(); 
?>
