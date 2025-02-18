<?php 

include 'con.php';
include 'store.php';
$subject = isset($_POST['subject']) ? $_POST['subject'] : [];

?>
<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Add New User</h2>
    </div>
    <div class="card-body">
<form method="post" enctype="multipart/form-data">
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
            Gender:
            <input type="radio" name="gender" value="Male" <?php echo $gender == 'Male' ? 'checked' : '' ?>> Male
            <input type="radio" name="gender" value="Female" <?php echo $gender == 'Female' ? 'checked' : '' ?> > Female
            <?php if (!empty($error['gender'])): ?>
                    <p style='color:red;'><?php echo $error['gender'] ?></p>
                <?php endif; ?>
        </div>
        <div class="form-group">
            subject:
            <input type="checkbox" name="subject[]" value="maths"  <?= in_array("maths", $subject) ? "checked" : "" ?> >maths
            <input type="checkbox" name="subject[]" value="physics"   <?= in_array("physics", $subject) ? "checked" : "" ?>>physics
            <input type="checkbox" name="subject[]" value="computer"  <?= in_array("computer", $subject) ? "checked" : "" ?> >computer
            <input type="checkbox" name="subject[]" value="chemistry"  <?= in_array("chemistry", $subject) ? "checked" : "" ?> >chemistry
            
            <?php if (!empty($error['subject'])): ?>
                    <p style='color:red;'><?php echo $error['subject'] ?></p>
                <?php endif; ?>
        </div>
        <div class="form-group">
        
            language:
            <select name="language">
            <option value="">Select</option>
                    <option value="english" <?php echo $_POST['language'] == 'english' ? 'selected' : '' ?>>english</option>
                    <option value="german" <?php echo $_POST['language']  == 'german' ? 'selected' : '' ?>>german</option>
                    <option value="french" <?php echo $_POST['language']  == 'french' ? 'selected' : '' ?>>french</option>
                    <option value="italian" <?php echo $_POST['language']  == 'italian' ? 'selected' : '' ?>>italian</option>
            </select>
            <?php if (!empty($error['language'])): ?>
                    <p style='color:red;'><?php echo $error['language'] ?></p>
                <?php endif; ?>
        </div>
        <div class="form-group">
            Profile Image:
            <?php if (isset($profile_image) && $profile_image): ?>
                <img class="user-image rounded-circle shadow" alt="User Image" style="width: 38px; height:36px;" src="uploads/<?php echo $profile_image; ?>"/>
            <?php endif; ?>
            <input type="file" name="profile_image" />
                <?php if (!empty($error['profile_image'])): ?>
                    <p style='color:red;'><?php echo $error['profile_image']?></p>
                <?php endif; ?>
        </div>

        <div class="col-md-4">
            <input class="btn btn-block btn-primary btn-lg" type="submit" name="submit" id="submit" value="submit">
        </div>
    </div>
            </div>
  
        </form>
