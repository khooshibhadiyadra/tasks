<div?php
    $id=intval($_GET['id']);
    $onerecord=new DB_con();
    $sql=$onerecord->fetchonerecord($id);
    $cnt = 1;
    while ($row = mysqli_fetch_array($sql)) {
    }
    ?>
    <form name="insert" method="post">
        <div class="row">
            <div class="col-md-4"><b>First Name</b>
                <input type="text" name="first_name" value="<?php echo htmlentities($row['first_name']); ?>" class="form-control" required>
            </div>
            <div class="col-md-4"><b>Last Name</b>
                <input type="text" name="last_name" value="<?php echo htmlentities($row['last_name']); ?>" class="form-control" required>
            </div>
            <div class="col-md-4"><b>Email</b>
                <input type="text" name="email" value="<?php echo htmlentities($row['email']); ?>" class="form-control" required>
            </div>
            <div class="col-md-4"><b>Phone</b>
                <input type="text" name="phone" value="<?php echo htmlentities($row['phone']); ?>" class="form-control" required>
            </div>
            <div class="col-md-4"><b>Address</b>
                <input type="text" name="address" value="<?php echo htmlentities($row['address']); ?>" class="form-control" required>
            </div>
            <div class="col-md-4"><b>Gender</b>
                <input type="radio" name="gender" value="Male" <?php echo $user['gender'] == 'Male' ? 'checked' : '' ?>> Male
                <input type="radio" name="gender" value="Female" <?php echo $user['gender'] == 'Female' ? 'checked' : '' ?>> Female
            </div>
            <div class="col-md-4">
                Hobbies:
                <input type="checkbox" name="hobbies[]" value="Reading" <?php if (in_array("Reading", $hobbie)) { ?> checked="checked" <?php } ?>>Reading
                <input type="checkbox" name="hobbies[]" value="Travelling" <?php if (in_array("Travelling", $hobbie)) { ?> checked="checked" <?php } ?>>Travelling
                <input type="checkbox" name="hobbies[]" value="Sports" <?php if (in_array("Sports", $hobbie)) { ?> checked="checked" <?php } ?>>Sports
            </div>
            <div class="col-md-4">
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
            <div class="col-md-4">
                Profile Image:
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
        </div>
    </form>