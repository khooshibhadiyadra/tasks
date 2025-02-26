<?php 
session_start();
include 'header.php';
include 'sidebar.php';
include 'conn.php';
$id = $_GET['id'];
$query = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($query);
$imagequery="SELECT profile_image FROM users WHERE email='$email'";
$resultimage = mysqli_query($conn, $imagequery);
$user = $result->fetch_assoc();
?>
<?php header("htmlstyle.html"); ?>
<title>Update User</title>
    <div class="card card-primary">
        <div class="card-header">
            <h2 class="card-title">Update User</h2>
        </div>
        <div class="card-body">
            <form action="update_action.php" method="POST" enctype="multipart/form-data">  <?php
           
           if (isset($_SESSION['errors'])) {
               foreach ($_SESSION['errors'] as $field => $error) {
                
               }
           }
           ?>
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                <div class="form-group">
                    First Name: <input class="form-control" type="text" name="first_name" value="<?php echo $user['first_name']; ?>" >
                    <?php if (isset($_SESSION['errors']['first_name'])): ?>
                    <p style='color:red;' class="text-red-500"><?= $_SESSION['errors']['first_name'] ?></p>
                <?php endif; ?>
                </div>
                <br>
                <div class="form-group">
                    Last Name: <input class="form-control" type="text" name="last_name" value="<?php echo $user['last_name']; ?>" >
                    <?php if (isset($_SESSION['errors']['last_name'])): ?>
                    <p style='color:red;' class="text-red-500"><?= $_SESSION['errors']['last_name'] ?></p>
                <?php endif; ?>
                </div>
                <br>
                <div class="form-group">
                    Email: <input class="form-control" type="email" name="email" value="<?php echo $user['email']; ?>" >
                    <?php if (isset($_SESSION['errors']['email'])): ?>
                    <p style='color:red;' class="text-red-500"><?= $_SESSION['errors']['email'] ?></p>
                <?php endif; ?>
                </div>
                <br>
                <div class="form-group">
                    Phone: <input class="form-control" type="text" name="phone" value="<?php echo $user['phone']; ?>" ><br>
                    <?php if (isset($_SESSION['errors']['phone'])): ?>
                    <p style='color:red;' class="text-red-500"><?= $_SESSION['errors']['phone'] ?></p>
                <?php endif; ?>
                </div>
                <br>
                <div class="form-group">
                    Address: <textarea class="form-control" name="address"><?php echo $user['address']; ?></textarea><br>
                    <?php if (isset($_SESSION['errors']['address'])): ?>
                    <p style='color:red;' class="text-red-500"><?= $_SESSION['errors']['address'] ?></p>
                <?php endif; ?>
                </div>
                <br>
                <div class="form-group">
                    Gender:
                    <input type="radio" name="gender" value="Male" <?php if ($user['gender'] == 'Male') echo 'checked'; ?> > Male
                    <input type="radio" name="gender" value="Female" <?php if ($user['gender'] == 'Female') echo 'checked'; ?> > Female<br>
                    <?php if (isset($_SESSION['errors']['gender'])): ?>
                    <p style='color:red;' class="text-red-500"><?= $_SESSION['errors']['gender'] ?></p>
                <?php endif; ?>
                </div>
                <br>
                <div class="form-group">
                    Hobbies:
                    <input type="checkbox" name="hobbies[]" value="Reading" <?php if (strpos($user['hobbies'], 'Reading') !== false) echo 'checked'; ?>> Reading
                    <input type="checkbox" name="hobbies[]" value="Travelling" <?php if (strpos($user['hobbies'], 'Travelling') !== false) echo 'checked'; ?>> Travelling
                    <input type="checkbox" name="hobbies[]" value="Sports" <?php if (strpos($user['hobbies'], 'Sports') !== false) echo 'checked'; ?>> Sports<br>
                    <?php if (isset($_SESSION['errors']['hobbies'])): ?>
                    <p style='color:red;' class="text-red-500"><?= $_SESSION['errors']['hobbies'] ?></p>
                <?php endif; ?>
                </div>
                <br>
                <div class="form-group">
                    Country:
                    <select name="country" >
                        <option value="India" <?php if ($user['country'] == 'India') echo 'selected'; ?>>India</option>
                        <option value="germany" <?php if ($user['country'] == 'germany') echo 'selected'; ?>>germany</option>
                        <option value="canada" <?php if ($user['country'] == 'canada') echo 'selected'; ?>>canada</option>
                        <?php if (isset($_SESSION['errors']['country'])): ?>
                    <p style='color:red;' class="text-red-500"><?= $_SESSION['errors']['country'] ?></p>
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
                  alt="User Image" style="width: 50px;
    height: 50px;" src="uploads/<?php echo $profile_image; ?>" />
                
                    Profile Image: <input type="file" name="profile_image">
                    <?php if (isset($_SESSION['errors']['profile_image'])): ?>
                    <p style='color:red;' class="text-red-500"><?= $_SESSION['errors']['profile_image'] ?></p>
                <?php endif; ?>
                </div>
                <br>
                <button class="btn btn-block btn-primary btn-lg" type="submit" name="submit">Update</button>
            </form>

            <?php include 'footer.php';
