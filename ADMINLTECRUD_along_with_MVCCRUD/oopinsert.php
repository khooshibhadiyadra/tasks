<?php 

include 'oopcon.php';
include 'oopstore.php';
include 'header.php';
include 'sidebar.php';
?>
<form method="post" enctype="multipart/form-data">
    <div class="card-body">
        <div class="form-group">
            First Name: <input class="form-control" type="text" name="first_name" />
        </div>
        <br>
        <div class="form-group">
            Last Name: <input class="form-control" type="text" name="last_name" />
        </div>
        <br>
        <div class="form-group">
            Email: <input class="form-control" type="text" name="email" />

        </div>
        <div class="form-group">
            Password <input class="form-control" type="password" name="password"/>

        </div>
        <div class="form-group">
            Confirm Password: <input class="form-control" type="password" name="confirm_password"/>

        </div>
        <div class="form-group">
            Phone: <input class="form-control" type="text" name="phone"/>

        </div>
        <div class="form-group">
            Address:
            <textarea name="address" class="form-control"></textarea>

        </div>
        <div class="form-group">
            Gender:
            <input type="radio" name="gender"  value="Male" <?= $gender == 'Male' ? "checked" : "" ?>> Male
            <input type="radio" name="gender"  value="Fale" <?= $gender == 'Female' ? "checked" : "" ?>> Female

        </div>
        <div class="form-group">
          <?php 

          $hobbies = $_POST['hobbies'];
          echo "<pre>";
          print_r($_POST);
          $hobbie = explode(",", $hobbies);
          ?>
            Hobby:
            <input type="checkbox" name="hobbies[]" value="Reading" <?php if(in_array("Reading",$hobbie)) { ?> checked="checked" <?php } ?> >Reading
            <input type="checkbox" name="hobbies[]" value="Travelling" <?php if(in_array("Travelling",$hobbie)) { ?> checked="checked" <?php } ?>>Travelling
            <input type="checkbox" name="hobbies[]" value="Sports"<?php if(in_array("Sports",$hobbie)) { ?> checked="checked" <?php } ?>>Sports

        </div>
        <div class="form-group">
            Country:
            <select name="country">
                <option value="">Select</option>
                <option value="India" <?= $country == "India" ? "selected" : "" ?>>India</option>
                <option value="Germany"<?= $country == "Germany" ? "selected" : "" ?>>Germany</option>
                <option value="Canada"<?= $country == "Canada" ? "selected" : "" ?>>Canada</option>

            </select>
        </div>
        <div class="form-group">
            Profile Image:
            <?php if ($profile_image): ?>
                    <img class="user-image rounded-circle shadow" alt="User Image" style="width: 38px; height: 36px;" src="uploads/<?php echo $profile_image; ?>" />
                <?php endif; ?>
            <input type="file" name="profile_image" />

        </div>


    </div>
    <div class="form-group">
            <input class="btn btn-block btn-primary btn-lg" type="submit" name="submit" id="submit" value="submit">
        </div>
        </form>
<?php 
include 'footer.php';
?>