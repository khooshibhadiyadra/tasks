<?php
session_start();
include 'header.php';
include 'sidebar.php';
include 'conn.php';
$query = "SELECT * FROM users";
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
            // var_dump($_SESSION);
            // ini_set('display_errors',1);
            // error_reporting(E_ALL);
            if (isset($_SESSION['errors'])) {
                foreach ($_SESSION['errors'] as $field => $error) {
                    //         echo "<pre>";
                    //        print_r($field);
                    //        echo "</pre>";
                    // echo "<p style='color:red;'>{$error}</p>"; 

                }
                // print_r($_SESSION['errors']);
            }
            //     print_r($_SESSION['errors']);
            ?>
            <div class="form-group">
                First Name: <input class="form-control" type="text" name="first_name">
                <?php if (isset($_SESSION['errors'][0])): ?>
                    <p style='color:red;' class="text-red-500"><?= $_SESSION['errors'][0] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Last Name: <input class="form-control" type="text" name="last_name">
                <?php if (isset($_SESSION['errors'][1])): ?>
                    <p style='color:red;' class="text-red-500"><?= $_SESSION['errors'][1] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Email: <input class="form-control" type="email" name="email">
                <?php if (isset($_SESSION['errors'][2])): ?>
                    <p style='color:red;' class="text-red-500"><?= $_SESSION['errors'][2] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Password: <input style='color:red;' class="form-control" type="password" name="password">
                <?php if (isset($_SESSION['errors'][3])): ?>
                    <p class="text-red-500"><?= $_SESSION['errors'][3] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Confirm Password: <input class="form-control" type="password" name="confirm_password">
                <?php if (isset($_SESSION['errors'][4])): ?>
                    <p style='color:red;' class="text-red-500"><?= $_SESSION['errors'][4] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Phone: <input class="form-control" type="text" name="phone">
                <?php if (isset($_SESSION['errors'][5])): ?>
                    <p style='color:red;' class="text-red-500"><?= $_SESSION['errors'][5] ?></p>
                <?php endif; ?>
                <br>
            </div>
            <div class="form-group">
                Address: <textarea name="address" class="form-control"></textarea>
                <?php if (isset($_SESSION['errors'][6])): ?>
                    <p style='color:red;' class="text-red-500"><?= $_SESSION['errors'][6] ?></p>
                <?php endif; ?><br>
            </div>
            <div class="form-group">
                Gender:
                <input type="radio" name="gender" value="Male"> Male
                <input type="radio" name="gender" value="Female"> Female<br>
                <?php if (isset($_SESSION['errors'][7])): ?>
                    <p style='color:red;' class="text-red-500"><?= $_SESSION['errors'][7] ?></p>
                <?php endif; ?>
            </div>
            <br>
            <div class="form-group">
                Hobbies:
                <input type="checkbox" name="hobbies[]" value="Reading"> Reading
                <input type="checkbox" name="hobbies[]" value="Travelling"> Travelling
                <input type="checkbox" name="hobbies[]" value="Sports"> Sports<br>
                <?php if (isset($_SESSION['errors'][8])): ?>
                    <p style='color:red;' class="text-red-500"><?= $_SESSION['errors'][8] ?></p>
                <?php endif; ?>
            </div>
            <br>
            <div class="form-group">
                Country:
                <select name="country">
                    <option value="">Select</option>
                    <option value="India">India</option>
                    <option value="germany">germany</option>
                    <option value="canada">canada</option>
                </select>
                <?php if (isset($_SESSION['errors'][9])): ?>
                    <p class="text-red-500"><?= $_SESSION['errors'][9] ?></p>
                <?php endif; ?>

            </div>
            <br>
            <div class="form-group">
                Profile Image: <input type="file" name="profile_image">
                <?php if (isset($_SESSION['errors'][10])): ?>
                    <p class="text-red-500"><?= $_SESSION['errors'][10] ?></p>
                <?php endif; ?>
            </div>
            <br>
            <div class="form-group">
                <button class="btn btn-block btn-primary btn-lg" type="submit" id="submit" name="submit">Submit</button>
            </div>
    </div>
    </form>
</div>
<?php include 'footer.php'; 