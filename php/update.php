<?php
include 'conn.php';
include 'updateaction.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
                Gender
                <input type="radio" name="gender" value="male" <?php echo $row['gender'] == 'male' ? 'checked' : '' ?>> Male
                <input type="radio" name="gender" value="female" <?php echo $row['gender'] == 'female' ? 'checked' : '' ?>> Female
                <?php if (!empty($error['gender'])): ?>
                    <p style='color:red;'><?php echo $error['gender'] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
            <?php
                    $subject = $row['subject'];
                    $subjects = explode(",", $subject ?? '');
            ?>
                subject:
                <input type="checkbox" name="subject[]" value="maths" <?= strpos($subject, "maths") !== false ? "checked" : "" ?>>maths
                <input type="checkbox" name="subject[]" value="physics" <?= strpos($subject, "physics") !== false ? "checked" : "" ?>>physics
                <input type="checkbox" name="subject[]" value="computer" <?= strpos($subject, "computer") !== false ? "checked" : "" ?>>computer
                <input type="checkbox" name="subject[]" value="chemistry" <?= strpos($subject, "chemistry") !== false ? "checked" : "" ?>>chemistry

                <?php if (!empty($error['subject'])): ?>
                    <p style='color:red;'><?php echo $error['subject'] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                language:
                <select name="language">
                    <option value="english">english</option>
                    <option value="german">german</option>
                    <option value="french">french</option>
                    <option value="italian">italian</option>

                </select>
                <?php if (!empty($error['language'])): ?>
                    <p style='color:red;'><?php echo $error['language'] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
               
                Profile Image:
                <img src="uploads/<?= htmlspecialchars($row['profile_image']) ?>" width="100" height="100" alt="profile image"><br>
                <input type="file" name="profile_image">
               
                <?php if (!empty($error['profile_image'])): ?>
                    <p style='color:red;'><?php echo $error['profile_image'] ?></p>
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
