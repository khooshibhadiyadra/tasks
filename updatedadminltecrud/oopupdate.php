<?php
include 'oopheader.php';
include 'sidebar.php';
include 'oopcon.php';
include 'oopupdateaction.php';
$id = intval($_GET['id']);
$onerecord = new DB_con();
$sql = $onerecord->fetchonerecord($id);
$cnt = 1;

while ($row = mysqli_fetch_array($sql)) {
?>
<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Add New User</h2>
    </div>
    <div class="card-body">
<form name="update" method="post" enctype="multipart/form-data" action="">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                First Name
                <input class="form-control" type="text" name="first_name" value="<?php echo $row['first_name']; ?>">
                <?php if (!empty($error['first_name'])): ?>
                    <p style='color:red;'><?php echo $error['first_name'] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Last Name
                <input class="form-control" type="text" name="last_name" value="<?php echo $row['last_name']; ?>">
                <?php if (!empty($error['last_name'])): ?>
                    <p style='color:red;'><?php echo $error['last_name'] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Email
                <input class="form-control" type="text" name="email" value="<?php echo $row['email']; ?>">
                <?php if (!empty($error['email'])): ?>
                    <p style='color:red;'><?php echo $error['email'] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Phone
                <input class="form-control" type="text" name="phone" value="<?php echo $row['phone']; ?>" class="form-control">
                <?php if (!empty($error['phone'])): ?>
                    <p style='color:red;'><?php echo $error['phone'] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Address
                <input class="form-control" type="text" name="address" value="<?php echo $row['address']; ?>" class="form-control">
                <?php if (!empty($error['address'])): ?>
                    <p style='color:red;'><?php echo $error['address'] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Gender
                <input type="radio" name="gender" value="Male" <?php echo $row['gender'] == 'Male' ? 'checked' : '' ?>> Male
                <input type="radio" name="gender" value="Female" <?php echo $row['gender'] == 'Female' ? 'checked' : '' ?>> Female
                <?php if (!empty($error['gender'])): ?>
                    <p style='color:red;'><?php echo $error['gender'] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <?php
                $hobbies = $row['hobbies'];
                $hobbie = explode(",", $hobbies ?? '');

                ?>
                Hobby:

                <input type="checkbox" name="hobbies[]" value="Reading" <?= strpos($hobbies, "Reading") !== false ? "checked" : "" ?>>Reading
                <input type="checkbox" name="hobbies[]" value="Travelling" <?= strpos($hobbies, "Travelling") !== false ? "checked" : "" ?>>Travelling
                <input type="checkbox" name="hobbies[]" value="Sports" <?= strpos($hobbies, "Sports") !== false ? "checked" : "" ?>>Sports
                <?php if (!empty($error['hobbies'])): ?>
                    <p style='color:red;'><?php echo $error['hobbies'] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Country:
                <select name="country">
                    <option value="India">India</option>
                    <option value="germany">germany</option>
                    <option value="canada">canada</option>

                </select>
                <?php if (!empty($error['country'])): ?>
                    <p style='color:red;'><?php echo $error['country'] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
               
                Profile Image:
                <input type="file" name="profile_image">
                <?php if (!empty($error['profile_image'])): ?>
                    <p class="text-red-500"><?php echo $error['profile_image'] ?></p>
                <?php endif; ?>

            </div>
            <div class="form-group">
                <input class="btn btn-block btn-primary btn-lg" type="submit" name="update" value="update" id="update">
            </div>
        </div>
    </form>
    </div>

<?php
    $cnt++;
}
include 'footer.php';
