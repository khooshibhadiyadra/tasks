<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$id = $_GET['id'];

$con = mysqli_connect("localhost", "root", "admin123", "ajax_crudtest");
$query = "SELECT * FROM `users` WHERE id = '$id'";
$result = $con->query( $query);

$user = $result->fetch_assoc();



?>
<!DOCTYPE html>
<html
    lang="en">

<head>
    <title>Update User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Update User</h2>
        <form id="updateForm" enctype="multipart/form-data" method="POST">
            
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="fname" name="first_name" value="<?php echo $user['first_name']; ?>">
                <span class="text-danger" id="fnamerr"></span><br>
           
            </div>
    
            <div class="form-group">
                <label for="name">Last Name</label>
                <input type="text" class="form-control" id="lname" name="last_name" value="<?php echo $user['last_name']; ?>">
                <span class="text-danger" id="lnamerr"></span><br>
            </div>

            <div class="form-group">
                Email: <input class="form-control" id="email" type="email" name="email" value="<?php echo $user['email']; ?>">
                <span class="text-danger" id="emailerr"></span><br>
                <input class="form-control" id="lname" name="last_name" value="<?php echo $user['email'];?>">
            </div>
            <div class="form-group">
                Phone: <input class="form-control" id="phone" type="text" name="phone" value="<?php echo $user['phone']; ?>"><br>
                <span class="text-danger" id="phonerr"></span><br>
            </div>
            <div class="form-group">
                Address: 
                
                <textarea class="form-control" name="address" id="address"><?php echo $user['address']; ?></textarea><br>
                <span class="text-danger" id="adderr"></span><br>
            
            </div>
            <div class="form-group">
                <?php
                $gender = $user['gender'];
                ?>
                <label for="gender" id="gender">Gender</label>
                <input type="radio" name="gender" value="male" <?php echo $user['gender'] == 'male' ? 'checked' : '' ?>> Male
                <input type="radio" name="gender" value="female" <?php echo $user['gender'] == 'female' ? 'checked' : '' ?>> Female
                <br>
            </div>
            <span class="text-danger" id="gendererr"></span><br>
            <div class="form-group">
                <?php
               $hobbies = $row['hobbies'];
               $hobbie = explode(",", $hobbies ?? '');
                ?>
             <label for="hobbies" id="hobbies">Hobby</label>
                <input type="checkbox" name="hobbies[]" value="reading" <?php echo strpos($user['hobbies'], 'reading') !== false ? 'checked' : ''; ?>>Reading
                <input type="checkbox" name="hobbies[]" value="writing" <?php echo strpos($user['hobbies'], 'writing') !== false ? 'checked' : ''; ?>>writing
            </div>
            <span class="text-danger" id="hobbyerr"></span><br>
         
            <div class="form-group">
                <label for="country" id="country">Country</label>
                <select name="country">
                    <option value="India">India</option>
                    <option value="germany">germany</option>
                    <option value="canada">canada</option>
                </select>
            </div>
            <span class="text-danger" id="countryerr"></span><br>
            <div class="form-group">
                Profile Image:
                <input type="file" name="profile_image" id="profile_image">
            </div>
            <span class="text-danger" id="pimagerr"></span><br>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {

      $("#updateForm").submit(function(event) {
        // Clear previous error messages
        $(".error").html("");

        // Validate username
        var first_name = $("#first_name").val();
        if (first_name === "") {
          $("#fnamerr").html("firstname is required");
          event.preventDefault();
        } 

        //validate lastname
        var last_name = $("#last_name").val();
        if (last_name === "") {
          $("#lnamerr").html("lastname is required");
          event.preventDefault();
        }

        // Validate email
        var email = $("#email").val();
        emailReg = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email === "") {
          $("#emailerr").html("Email is required");
          event.preventDefault();
        } else if (!emailReg.test(email)) {
          $("#emailerr").html("Enter a valid email address");
          event.preventDefault();
        }
        //validate address
        var address = $("#address").val();
        if (address === "") {
          $("#adderr").html("address is required");
          event.preventDefault();
        }
        //validate gender
        var gender = $("#gendererr").val();
        if (gender === "") {
          $("#gendererr").html("gender is required");
          event.preventDefault();
        }
        //validate hobbies
        var hobbies = $("#hobbyerr").val();
        if (hobbies === "") {
          $("#hobbyerr").html("hobby is required");
          event.preventDefault();
        }
        // Validate Phone
        var phone = $("#phone").val();
        phoneReg = /^[0-9]{10}$/;
        if (phone === "") {
          $("#phonerr").html("Phone Number is required");
          event.preventDefault();
        } else if (!phoneReg.test(phone)) {
          $("#phonerr").html("Enter 10 digit number");
          event.preventDefault();
        }
        //validate country
        var country = $("#country").val();
        if (country === "") {
         $("#countryerr").html("country is required");
          event.preventDefault();
        }
        //validate profile_image
        var profile_image = $("#profile_image").val();
        if (profile_image === "") {
          $("#pimagerr").html("profile image is required");
          event.preventDefault();
        }
      });
            $("#updateForm").submit(function(event) {
        event.preventDefault();
        $.ajax({
          url: "update_action.php",
          type: "POST",
          data: $(this).serialize(),
          success: function(response) {
            alert(response);
          }
        });

      });
    });
    function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
  </script>

</body>

</html>