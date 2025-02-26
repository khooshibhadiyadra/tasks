<?php 
include 'oopheader.php';
include 'sidebar.php';
include 'oopcon.php';
include 'oopstore.php';
$hobbies = isset($_POST['hobbies']) ? $_POST['hobbies'] : [];
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$hobbies = isset($_POST['hobbies']) ? $_POST['hobbies'] : [];
?>
<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Add New User</h2>
    </div>
    <div class="card-body">
<form method="post">
    <div class="form-group">

            First Name: <input class="form-control" type="text" name="first_name" value="<?php echo $first_name; ?>">
            <?php if (!empty($error['first_name'])): ?>
                    <p style='color:red;'><?php echo $error['first_name'] ?></p>
                <?php endif; ?>
        </div>
        <div class="form-group">
            Last Name: <input class="form-control" type="text" name="last_name" value="<?php echo $last_name; ?>">
            <?php if (!empty($error['last_name'])): ?>
                    <p style='color:red;'><?php echo $error['last_name'] ?></p>
                <?php endif; ?>
        </div>
        <div class="form-group">
            Email: <input class="form-control" type="text" name="email" value="<?php echo $email; ?>">
            <?php if (!empty($error['email'])): ?>
                    <p style='color:red;'><?php echo $error['email'] ?></p>
                <?php endif; ?>
        </div>
        <div class="form-group">
            Password <input class="form-control" type="password" name="password" value="<?php echo $password; ?>">
            <?php if (!empty($error['password'])): ?>
                    <p style='color:red;'><?php echo $error['password'] ?></p>
                <?php endif; ?>
        </div>
        <div class="form-group">
            Confirm Password: <input class="form-control" type="password" name="confirm_password" value="<?php echo $confirm_password; ?>">
            <?php if (!empty($error['confirm_password'])): ?>
                    <p style='color:red;'><?php echo $error['confirm_password'] ?></p>
                <?php endif; ?>
        </div>
        <div class="form-group">
            Phone: <input class="form-control" type="text" name="phone" value="<?php echo $phone; ?>">
            <?php if (!empty($error['phone'])): ?>
                    <p style='color:red;'><?php echo $error['phone'] ?></p>
                <?php endif; ?>
        </div>
        <div class="form-group">
            Address:
            <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
            <?php if (!empty($error['address'])): ?>
                    <p style='color:red;'><?php echo $error['address'] ?></p>
                <?php endif; ?>
        </div>
        <div class="form-group">
            Gender:
            <input type="radio" name="gender" value="Male" <?php echo $gender == 'Male' ? 'checked' : '' ?>> Male
            <input type="radio" name="gender" value="Female" <?php echo $gender == 'Female' ? 'checked' : '' ?> > Female
            <?php if (!empty($error['gender'])): ?>
                    <p style='color:red;'><?php echo $error['gender'] ?></p>
                <?php endif; ?>
        </div>
        <div class="form-group">
            Hobby:
            <input type="checkbox" name="hobbies[]" value="Reading"  <?= in_array("Reading", $hobbies) ? "checked" : "" ?> >Reading
            <input type="checkbox" name="hobbies[]" value="Travelling"   <?= in_array("Travelling", $hobbies) ? "checked" : "" ?>>Travelling
            <input type="checkbox" name="hobbies[]" value="Sports"  <?= in_array("Sports", $hobbies) ? "checked" : "" ?> >Sports
            <?php if (!empty($error['hobbies'])): ?>
                    <p style='color:red;'><?php echo $error['hobbies'] ?></p>
                <?php endif; ?>
        </div>
        <div class="form-group">
            Country:
            <select name="country">
                <option value="">Select</option>
                <option value="India" <?php echo $_POST['country'] == 'India' ? 'selected' : '' ?> >India</option>
                <option value="Germany" <?php echo $_POST['country'] == 'Germany' ? 'selected' : '' ?> >Germany</option>
                <option value="Canada" <?php echo $_POST['country'] == 'Canada' ? 'selected' : '' ?>>Canada</option>
            </select>
            <?php if (!empty($error['country'])): ?>
                    <p style='color:red;'><?php echo $error['country'] ?></p>
                <?php endif; ?>
        </div>
        <div class="form-group">
            Profile Image:
            <?php if (isset($profile_image) && $profile_image): ?>
                <img class="user-image rounded-circle shadow" alt="User Image" style="width: 38px; height:36px;" src="uploads/<?php echo $profile_image; ?>"/>
            <?php endif; ?>
            <input type="file" name="profile_image" />
                <?php if (!empty($error['profile_image'])): ?>
                    <p class="text-red-500"><?php echo $error['profile_image']?></p>
                <?php endif; ?>
        </div>


    </div>
            </div>
    <div class="col-md-4">
            <input class="btn btn-block btn-primary btn-lg" type="submit" name="submit" id="submit" value="submit">
        </div>
        </form>