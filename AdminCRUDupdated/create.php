<?php
// session_start();

include 'header.php';
include 'sidebar.php';
include 'conn.php';

$errors = [];
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// $old_data = $_POST; 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {

        if (empty($_POST['first_name'])) {
            $firstnamerr = "First name is required.";
        } else {
            $first_name = test_input($_POST['first_name']);
        }
        if (empty($_POST['last_name'])) {
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


        if (empty($_POST['password'])) {
            $passworderr = "Password is required.";
        } elseif (strlen($_POST['password']) <= 8) {
            $passworderr = "Password length should be more than 8 characters.";
        } elseif (!preg_match("#[0-9]+#", $_POST['password'])) {
            $passworderr = "Your password must contain at least 1 number!";
        } elseif (!preg_match("#[a-z]+#", $_POST['password'])) {
            $passworderr = "Password must contain at least 1 lowercase alphabet.";
        } elseif (!preg_match("#[A-Z]+#", $_POST['password'])) {
            $passworderr = "Password must contain at least 1 uppercase alphabet.";
        } else {
            $password = $_POST['password'];
        }

        if (empty($_POST['confirm_password'])) {
            $confirmpassworderr = "Confirm password is required.";
        } elseif ($_POST['confirm_password'] !== $_POST['confirm_password']) {
            $confirmpassworderr = "Passwords do not match.";
        } else {
            $confirm_password = $_POST['confirm_password'];
        }


        if (empty($_POST['phone'])) {
            $phonerr = "Phone number is required.";
        } elseif (strlen($_POST['phone']) < 10) {
            $passworderr = "Password length should be more than 10 characters.";
        } else {
            $phone = test_input($_POST['phone']);
        }

        if (empty($_POST['address'])) {
            $addresserr = "Address is required.";
        } else {
            $address = test_input($_POST['address']);
        }

        if (empty($_POST['gender'])) {
            $gendererr = "Gender is required.";
        } else {
            $gender = test_input($_POST['gender']);
        }

        if (empty($_POST['hobbies'])) {
            $hobbieserr = "Hobbies are required.";
        } else {
            $hobbies = implode(",", $_POST['hobbies']);
        }


        if (empty($_POST['country'])) {
            $countryerr = "Country is required.";
        } else {
            $country = test_input($_POST['country']);
        }

        if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
            $profile_image = $_FILES['profile_image']['name'];
            $target_dir = "uploads/";
            move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_dir . $profile_image);
        } else {
            $profileimageerr = "Error uploading profile image.";
        }
        if (empty($firstnamerr) || empty($lastnameerr) || empty($emailerr) || empty($password) || empty($confirm_password) || empty($address) || empty($phone) || empty($email) || empty($gender) || empty($hobbies) || empty($address) || empty($country) || empty($profile_image)) {
            $hashedpassword = password_hash($password, PASSWORD_DEFAULT);


            $emailvalidation = "SELECT email FROM users WHERE email='$email'";
            $result = mysqli_query($conn, $emailvalidation);
            if (mysqli_num_rows($result) > 0) {
                $errors['email'] = "Email already exists. Please use a different email.";
            } else {

                $query = "INSERT INTO users (first_name, last_name, email, password, phone, address, gender, hobbies, country, profile_image)
                          VALUES ('$first_name', '$last_name', '$email', '$hashedpassword', '$phone', '$address', '$gender', '$hobbies', '$country', '$profile_image')";
                $conn->query($query);


                header("Location: list.php");
                exit();
            }
        }
    }
}

$imagequery = "SELECT profile_image FROM users WHERE email='$email'";
$resultimage = mysqli_query($conn, $imagequery);
$profile_image = "";
if (mysqli_num_rows($resultimage) > 0) {
    $userimg = mysqli_fetch_assoc($resultimage);
    $profile_image = $userimg['profile_image'];
}

?>

<title>Add User</title>
<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Add New User</h2>
    </div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                First Name: <input class="form-control" type="text" name="first_name" value="<?php echo $_POST[$first_name]; ?>">
                <?php if (!empty($firstnamerr)): ?>
                    <p style='color:red;'><?= $firstnamerr ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Last Name: <input class="form-control" type="text" name="last_name" value="<?php echo $_POST[$last_name];  ?>">
                <?php if (!empty($lastnameerr)): ?>
                    <p style='color:red;'><?= $lastnameerr?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Email: <input class="form-control" type="email" name="email" value="<?php echo $_POST[$email]; ?>">
                <?php if (!empty($emailerr)): ?>
                    <p style='color:red;'><?= $emailerr ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Password: <input class="form-control" type="password" name="password" value="<?php echo $_POST[$password]; ?>">
                <?php if (!empty($passworderr)): ?>
                    <p style='color:red;'><?= $passworderr ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Confirm Password: <input class="form-control" type="password" name="confirm_password" value="<?php echo $_POST[$confirm_password]; ?>">
                <?php if (!empty($confirmpassworderr)): ?>
                    <p style='color:red;'><?= $confirmpassworderr ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Phone: <input class="form-control" type="text" name="phone" value="<?php echo $_POST[$phone]; ?>">
                <?php if (!empty($phonerr)): ?>
                    <p style='color:red;'><?= $phonerr ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Address: <textarea name="address" class="form-control"><?php echo $_POST[$address]; ?></textarea>
                <?php if (!empty($addresserr)): ?>
                    <p style='color:red;'><?= $addresserr ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Gender:
                <input type="radio" name="gender" value="Male" <?php echo $_POST[$gender] == 'Male' ? 'checked' : '' ?>> Male
                <input type="radio" name="gender" value="Female" <?php echo $_POST[$gender] == 'Female' ? 'checked' : '' ?>> Female
                <?php if (!empty($gendererr)): ?>
                    <p style='color:red;'><?= $gendererr ?></p>
                <?php endif; ?>
            </div>

            <div class="form-group">
          <?php 
          $hobbies = $_POST['hobbies'];
          $hobbie = explode(",", $hobbies);
          ?>
                Hobbies:

                <input type="checkbox" name="hobbies[]" value="Reading" <?php if(in_array("Reading",$hobbie)) { ?> checked="checked" <?php } ?> >Reading
                <input type="checkbox" name="hobbies[]" value="Travelling" <?php if(in_array("Travelling",$hobbie)) { ?> checked="checked" <?php } ?> >Travelling
                <input type="checkbox" name="hobbies[]" value="Sports" <?php if(in_array("Sports",$hobbie)) { ?> checked="checked" <?php } ?> >Sports
                <?php if (!empty($hobbieserr)): ?>
                    <p style='color:red;'><?= $hobbieserr ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Country:
                <select name="country">
                    <option value="">Select</option>
                    <option value="India" <?php echo $_POST[$country] == 'India' ? 'selected' : '' ?>>India</option>
                    <option value="Germany" <?php echo $_POST[$country]  == 'Germany' ? 'selected' : '' ?>>Germany</option>
                    <option value="Canada" <?php echo $_POST[$country]  == 'Canada' ? 'selected' : '' ?>>Canada</option>
                </select>
                <?php if (!empty($countryerr)): ?>
                    <p style='color:red;'><?= $countryerr ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Profile Image:
                <?php if ($profile_image): ?>
                    <img class="user-image rounded-circle shadow" alt="User Image" style="width: 38px; height: 36px;" src="uploads/<?php echo $profile_image; ?>" />
                <?php endif; ?>
                <input type="file" name="profile_image">
                <?php if (!empty($profileimageerr)): ?>
                    <p class="text-red-500"><?= $profileimageerr?></p>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <button class="btn btn-block btn-primary btn-lg" type="submit" id="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</div>

<?php
include 'footer.php';

