<?php
session_start();
include 'header.php';
include 'sidebar.php';
include 'conn.php';

$query = "SELECT * FROM users";
$imagequery="SELECT profile_image FROM users WHERE email='$email'";
$resultimage = mysqli_query($conn, $imagequery);
$result = $conn->query($query);
include 'htmlstyle.html'; ?>
<title>Add User</title>
<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Add New User</h2>
    </div>
    <div class="card-body">

        <form action="store.php" method="POST" enctype="multipart/form-data">

            <?php
           
            if (isset($_SESSION['errors'])) {
                foreach ($_SESSION['errors'] as $field => $error) {
                 
                }
            }
            ?>

            <div class="form-group">
                First Name: <input class="form-control" type="text" name="first_name" value="<?= isset($_POST['first_name']) ? $_POST['first_name'] : '' ?>">
                <?php if (isset($_SESSION['errors']['first_name'])): ?>
                    <p style='color:red;' class="text-red-500"><?=  $firstnameErr?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Last Name: <input class="form-control" type="text" name="last_name" value="<?= isset($_POST['last_name']) ? $_POST['last_name'] : (isset($_SESSION['old']['last_name']) ? $_SESSION['old']['last_name'] : '') ?>">
                <?php if (isset($_SESSION['errors']['last_name'])): ?>
                    <p style='color:red;' class="text-red-500"><?= $_SESSION['errors']['last_name'] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Email: <input class="form-control" type="email" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : (isset($_SESSION['old']['email']) ? $_SESSION['old']['email'] : '') ?>">
                <?php if (isset($_SESSION['errors']['email'])): ?>
                    <p style='color:red;' class="text-red-500"><?= $_SESSION['errors']['email'] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Password: <input style='color:red;' class="form-control" type="password" name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
                <?php if (isset($_SESSION['errors']['password'])): ?>
                    <p style='color:red;' class="text-red-500"><?= $_SESSION['errors']['password'] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Confirm Password: <input class="form-control" type="password" name="confirm_password" value="<?= isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '' ?>">
                <?php if (isset($_SESSION['errors']['confirm_password'])): ?>
                    <p style='color:red;' class="text-red-500"><?= $_SESSION['errors']['confirm_password'] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Phone: <input class="form-control" type="text" name="phone" value="<?= isset($_POST['phone']) ? $_POST['phone'] : (isset($_SESSION['old']['phone']) ? $_SESSION['old']['phone'] : '') ?>">
                <?php if (isset($_SESSION['errors']['phone'])): ?>
                    <p style='color:red;' class="text-red-500"><?= $_SESSION['errors']['phone'] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Address: <textarea name="address" class="form-control"><?= isset($_POST['address']) ? $_POST['address'] : (isset($_SESSION['old']['address']) ? $_SESSION['old']['address'] : '') ?></textarea>
                <?php if (isset($_SESSION['errors']['address'])): ?>
                    <p style='color:red;' class="text-red-500"><?= $_SESSION['errors']['address'] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Gender:
                <input type="radio" name="gender" value="Male" <?= (isset($_POST['gender']) && $_POST['gender'] == 'Male') || (isset($_SESSION['old']['gender']) && $_SESSION['old']['gender'] == 'Male') ? 'checked' : '' ?>> Male
                <input type="radio" name="gender" value="Female" <?= (isset($_POST['gender']) && $_POST['gender'] == 'Female') || (isset($_SESSION['old']['gender']) && $_SESSION['old']['gender'] == 'Female') ? 'checked' : '' ?>> Female
                <?php if (isset($_SESSION['errors']['gender'])): ?>
                    <p style='color:red;' class="text-red-500"><?= $_SESSION['errors']['gender'] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Hobbies:
                <input type="checkbox" name="hobbies[]" value="Reading" <?= (isset($_POST['hobbies']) && in_array('Reading', $_POST['hobbies'])) || (isset($_SESSION['old']['hobbies']) && in_array('Reading', $_SESSION['old']['hobbies'])) ? 'checked' : '' ?>> Reading
                <input type="checkbox" name="hobbies[]" value="Travelling" <?= (isset($_POST['hobbies']) && in_array('Travelling', $_POST['hobbies'])) || (isset($_SESSION['old']['hobbies']) && in_array('Travelling', $_SESSION['old']['hobbies'])) ? 'checked' : '' ?>> Travelling
                <input type="checkbox" name="hobbies[]" value="Sports" <?= (isset($_POST['hobbies']) && in_array('Sports', $_POST['hobbies'])) || (isset($_SESSION['old']['hobbies']) && in_array('Sports', $_SESSION['old']['hobbies'])) ? 'checked' : '' ?>> Sports
                <?php if (isset($_SESSION['errors']['hobbies'])): ?>
                    <p style='color:red;' class="text-red-500"><?= $_SESSION['errors']['hobbies'] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Country:
                <select name="country">
                    <option value="">Select</option>
                    <option value="India" <?= (isset($_POST['country']) && $_POST['country'] == 'India') || (isset($_SESSION['old']['country']) && $_SESSION['old']['country'] == 'India') ? 'selected' : '' ?>>India</option>
                    <option value="Germany" <?= (isset($_POST['country']) && $_POST['country'] == 'Germany') || (isset($_SESSION['old']['country']) && $_SESSION['old']['country'] == 'Germany') ? 'selected' : '' ?>>Germany</option>
                    <option value="Canada" <?= (isset($_POST['country']) && $_POST['country'] == 'Canada') || (isset($_SESSION['old']['country']) && $_SESSION['old']['country'] == 'Canada') ? 'selected' : '' ?>>Canada</option>
                </select>
                <?php if (isset($_SESSION['errors']['country'])): ?>
                    <p style='color:red;' class="text-red-500"><?= $_SESSION['errors']['country'] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
            
                Profile Image:
                <?php 
                if (mysqli_num_rows($resultimage) > 0) {
                    $userimg = $resultimage->fetch_assoc();
                    $profile_image = $user['profile_image'];
                    
                }
             
                ?>
                <img class=" user-image rounded-circle shadow"
                  alt="User Image" style="width: 38px;
    height: 36px;" src="uploads/<?php echo $profile_image; ?>" />
                
                <input type="file" name="profile_image">
              
                <?php if (isset($_SESSION['errors']['profile_image'])): ?>
                    <p class="text-red-500"><?= $_SESSION['errors']['profile_image'] ?></p>
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
