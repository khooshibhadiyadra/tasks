<?php
include 'header.php';
include 'sidebar.php';
include 'conn.php';
include 'store.php';


$query = "SELECT profile_image FROM users WHERE email='$email'";
$result = $conn->query($query);

?>

<title>Add User</title>
<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Add New User</h2>
    </div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                First Name: <input class="form-control" type="text" name="first_name" value="<?php echo $_POST['first_name']; ?>">
                <?php if (!empty($firstnamerr)): ?>
                    <p style='color:red;'><?php echo $firstnamerr ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Last Name: <input class="form-control" type="text" name="last_name" value="<?php echo $_POST['last_name'];  ?>">
                <?php if (!empty($lastnameerr)): ?>
                    <p style='color:red;'><?php echo $lastnameerr ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Email: <input class="form-control" type="email" name="email" value="<?php echo $_POST['email']; ?>">
                <?php if (!empty($emailerr)): ?>
                    <p style='color:red;'><?php echo $emailerr ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Password: <input class="form-control" type="password" name="password" value="<?php echo $_POST['password']; ?>">
                <?php if (!empty($passworderr)): ?>
                    <p style='color:red;'><?php echo $passworderr ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Confirm Password: <input class="form-control" type="password" name="confirm_password" value="<?php echo $_POST['confirm_password']; ?>">
                <?php if (!empty($confirmpassworderr)): ?>
                    <p style='color:red;'><?php echo $confirmpassworderr ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Phone: <input class="form-control" type="text" name="phone" value="<?php echo $_POST['phone']; ?>">
                <?php if (!empty($phonerr)): ?>
                    <p style='color:red;'><?php echo $phonerr ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Address: <textarea name="address" class="form-control"><?php echo $_POST['address']; ?></textarea>
                <?php if (!empty($addresserr)): ?>
                    <p style='color:red;'><?php echo $addresserr ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Gender:
                <input type="radio" name="gender" value="Male" <?php echo $_POST['gender'] == 'Male' ? 'checked' : '' ?>> Male
                <input type="radio" name="gender" value="Female" <?php echo $_POST['gender'] == 'Female' ? 'checked' : '' ?>> Female
                <?php if (!empty($gendererr)): ?>
                    <p style='color:red;'><?php echo $gendererr ?></p>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <?php
                $hobbies = $_POST['hobbies'];
                $hobbie = explode(",", $hobbies);
                ?>
                Hobbies:

                <input type="checkbox" name="hobbies[]" value="Reading" <?php if (in_array("Reading", $hobbie)) { ?> checked="checked" <?php } ?>>Reading
                <input type="checkbox" name="hobbies[]" value="Travelling" <?php if (in_array("Travelling", $hobbie)) { ?> checked="checked" <?php } ?>>Travelling
                <input type="checkbox" name="hobbies[]" value="Sports" <?php if (in_array("Sports", $hobbie)) { ?> checked="checked" <?php } ?>>Sports
                <?php if (!empty($hobbieserr)): ?>
                    <p style='color:red;'><?php echo $hobbieserr ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Country:
                <select name="country">
                    <option value="">Select</option>
                    <option value="India" <?php echo $_POST['country'] == 'India' ? 'selected' : '' ?>>India</option>
                    <option value="Germany" <?php echo $_POST['country']  == 'Germany' ? 'selected' : '' ?>>Germany</option>
                    <option value="Canada" <?php echo $_POST['country']  == 'Canada' ? 'selected' : '' ?>>Canada</option>
                </select>
                <?php if (!empty($countryerr)): ?>
                    <p style='color:red;'><?php echo $countryerr ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Profile Image:
                <?php if($result = $conn->query($query)){

    if ($profile_image): ?>
        <img class="user-image rounded-circle shadow" alt="User Image" style="width: 38px; height: 36px;" src="uploads/<?php echo $profile_image; ?>" />
    <?php else: ?>
        <p>No profile image set.</p>
    <?php endif; ?>

    <input type="file" name="profile_image">

    <?php if (!empty($profileimageerr)): ?>
        <p style='color:red;'><?= $profileimageerr ?></p>
    <?php endif; }?>
            </div>
            <div class="form-group">
                <button class="btn btn-block btn-primary btn-lg" type="submit" id="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</div>

<?php
include 'footer.php';
            
