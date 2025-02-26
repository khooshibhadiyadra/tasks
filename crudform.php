<?php include 'navbar.html'; ?>
<?php include 'body.html'; ?>

<div class="col-md-6">

    <div class="card card-primary card-outline mb-4" style="width: 1307px;">

        <div class="card-header">
            <div class="card-title">Registeration Form</div>
        </div>
        <form method="POST" action="main.php">

            <div class="card-body">
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                    <div id="firstname" class="form-text">FirstName is Required</div>
                </div>

                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                    <div id="lastname" class="form-text">LastName is Required</div>
                </div>

                <div class="mb-3">
                    <label for="email_address" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email_address" name="email_address" required>
                    <div id="email_address" class="form-text">Email is required</div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>

                <div class="mb-3">
                    <label>Gender:</label><br>
                    <input type="radio" name="gender" value="Female" id="female"> Female
                    <input type="radio" name="gender" value="Male" id="male"> Male
                </div>

                <div class="mb-3">
                    <label>Hobbies:</label><br>
                    <input type="checkbox" name="hobby[]" value="reading"> Reading
                    <input type="checkbox" name="hobby[]" value="writing"> Writing
                    <input type="checkbox" name="hobby[]" value="drawing"> Drawing
                </div>

                <div class="mb-3">
                    <label for="country">Country:</label>
                    <select name="country" id="country">
                        <option value="India">India</option>
                        <option value="Australia">Australia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="Canada">Canada</option>
                        <option value="Germany">Germany</option>
                    </select>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="create">Submit</button>
            </div>
        </form>

    </div>

</div>


<?php
// Registration logic
if (isset($_POST['create'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email_address'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $phone_number = $_POST['phone']; // Corrected input name
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $hobbies = isset($_POST['hobby']) ? implode(",", $_POST['hobby']) : '';
    $country = $_POST['country'];

    // Validate password match
    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
        exit;
    }

    // Hash the password for secure storage
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    // SQL insert query
    $sql = "INSERT INTO dataregisteration (first_name, last_name, email_address, password, phone_number, 
            address, gender, hobby, country)
            VALUES ('$first_name', '$last_name', '$email', '$password_hashed', '$phone_number', '$address', 
            '$gender', '$hobbies', '$country')";

    if ($conn->query($sql) === TRUE) {
        echo "New user registered successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!-- <h2>To update the values</h2>
<form method="POST" action="update.php">
    <input type="submit" name="edit" value="Edit">
</form> -->

<?php include 'footer.html'; ?>
</html>

<!-- For Login Validation -->
<?php
// Login logic
if (isset($_POST['login'])) {
    $email = $_POST['email_address'];
    $password = $_POST['password'];

    // Query the database to get the user data based on the email
    $sql = "SELECT * FROM dataregisteration WHERE email_address = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found
        $user = $result->fetch_assoc();

        // Verify the password with the hashed password stored in the database
        if (password_verify($password, $user['password'])) {
            echo "Login successful!";
            // You can redirect to the user dashboard or another page
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that email.";
    }
}
?>
