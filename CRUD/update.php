<?php

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
}
include 'conn.php';
include 'header.php';
include 'sidebar.php';
include 'update_action.php';


$id = $_GET['id'];
$query = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($query);
$imagequery = "SELECT profile_image FROM users WHERE email='$email'";
$resultimage = mysqli_query($conn, $imagequery);
$user = $result->fetch_assoc();
?>

<title>Update User</title>
<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Update User</h2>
    </div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data"> 
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <div class="form-group">
                First Name: <input class="form-control" type="text" name="first_name" value="<?php echo $user['first_name']; ?>">
                <?php if (!empty($firstnamerr)): ?>
                    <p style='color:red;'><?= $firstnamerr ?></p>
                <?php endif; ?>
            </div>
            <br>
            <div class="form-group">
                Last Name: <input class="form-control" type="text" name="last_name" value="<?php echo $user['last_name']; ?>">
                <?php if (!empty($lastnameerr)): ?>
                    <p style='color:red;'><?= $lastnameerr ?></p>
                <?php endif; ?>
            </div>
            <br>
            <div class="form-group">
                Email: <input class="form-control" type="email" name="email" value="<?php echo $user['email']; ?>">
                <?php if (!empty($emailerr)): ?>
                    <p style='color:red;'><?= $emailerr ?></p>
                <?php endif; ?>
            </div>
            <br>
            <div class="form-group">
                Phone: <input class="form-control" type="text" name="phone" value="<?php echo $user['phone']; ?>"><br>
                <?php if (!empty($phonerr)): ?>
                    <p style='color:red;' ><?= $phonerr ?></p>
                <?php endif; ?>
            </div>
            <br>
            <div class="form-group">
                Address: <textarea class="form-control" name="address"><?php echo $user['address']; ?></textarea><br>
                <?php if (!empty($addresserr)): ?>
                    <p style='color:red;' ><?= $addresserr ?></p>
                <?php endif; ?>
            </div>
            <br>
            <div class="form-group">
                <?php
                    $gender = $user['gender'];
                ?>
                Gender:
                <input type="radio" name="gender" value="Male" <?php echo $user['gender'] == 'Male' ? 'checked' : '' ?>> Male
                <input type="radio" name="gender" value="Female"  <?php echo $user['gender'] == 'Female' ? 'checked' : '' ?>> Female
                <br>
                <?php if (!empty($gendererr)): ?>
                    <p style='color:red;' ><?= $gendererr ?></p>
                <?php endif; ?>
            </div>
            <br>
            <div class="form-group">
                <?php
                  
                    $hobbies = $_POST['hobbies'];
                    $hobbie = explode(",", $hobbies);

                ?>
                Hobbies:
                <input type="checkbox" name="hobbies[]" value="Reading"  <?php if(in_array("Reading",$hobbie)) { ?> checked="checked" <?php } ?> >Reading
                <input type="checkbox" name="hobbies[]" value="Travelling" <?php if(in_array("Travelling",$hobbie)) { ?> checked="checked" <?php } ?> >Travelling
                <input type="checkbox" name="hobbies[]" value="Sports" <?php if(in_array("Sports",$hobbie)) { ?> checked="checked" <?php } ?> >Sports
                <?php if (!empty($hobbieserr)): ?>
                    <p style='color:red;' ><?= $hobbieserr ?></p>
                <?php endif; ?>
            </div>
            <br>
            <div class="form-group">
                Country:
                <select name="country">
                    <option value="India">India</option>
                    <option value="germany">germany</option>
                    <option value="canada">canada</option>
                    <?php if (!empty($countryerr)): ?>
                        <p style='color:red;'><?= $countryerr ?></p>
                    <?php endif; ?>
                </select>
            </div>
            <br>
            <div class="form-group">
                <?php

                if (mysqli_num_rows($resultimage) > 0) {
                    $userimg = $resultimage->fetch_assoc();
                    $profile_image = $user['profile_image'];
                }
                ?>
                Current Profile Image:<img
                    alt="User Image" style="width: 50px; height: 50px;" src="uploads/<?php echo $profile_image; ?>" />

                Profile Image: <input type="file" name="profile_image">
                <?php if (!empty($profileimageerr)): ?>
                    <p style='color:red;' class="text-red-500"><?= $profileimageerr ?></p>
                <?php endif; ?>
            </div>
            <br>
            <button class="btn btn-block btn-primary btn-lg" type="submit" name="submit">Update</button>
        </form>

        <?php include 'footer.php';
