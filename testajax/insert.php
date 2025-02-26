<!DOCTYPE html>
<html lang="en">
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<head>
  <title>Insert User</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <h2>Insert User</h2>
    <form id="insertForm" method="">
      <div class="form-group">
        <label for="name">First Name</label>
        <input type="text" class="form-control" id="first_name" name="first_name">
        <span class="text-danger" id="fnamerr"></span><br>
      </div>
      <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" id="last_name" name="last_name">
        <span class="text-danger" id="lnamerr"></span><br>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email">
        <span class="text-danger" id="emailerr"></span><br>
      </div>
      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" name="address">
        <span class="text-danger" id="adderr"></span><br>
      </div>
      <div class="form-group">
        <label for="phone">phone</label>
        <input type="text" class="form-control" id="phone" name="phone">
        <span class="text-danger" id="phonerr"></span><br>
      </div>
      <div class="form-group">
        <label for="password">password</label>
        <input type="password" class="form-control" id="password" name="password">
        <span class="text-danger" id="passworderr"></span><br>
      </div>
      <div class="form-group">
        <label for="confirmpassword">Confirm Password</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
        <span class="text-danger" id="confirmpwderr"></span><br>
      </div>
      <div class="form-group">
        <label for="gender" id="gender">Gender</label>
        Male <input type="radio" name="gender">
        Female<input type="radio" name="gender">

      </div>
      <span class="text-danger" id="gendererr"></span><br>
      <div class="form-group">
        <label for="country">country</label>
        <select class="form-control" id="country" name="country">
          <option value="">Select</option>
          <option value="India">India</option>
          <option value="Germany">Germany</option>
          <option value="Canada">Canada</option>

        </select>
        <span class="text-danger" id="countryerr"></span><br>
      </div>
      <div class="form-group">
        <label for="hobbies" id="hobbies">Hobby</label>
        <input type="checkbox" name="hobbies[]" value="reading">Reading
        <input type="checkbox" name="hobbies[]" value="writing">Writing
        <input type="checkbox" name="hobbies[]" value="travelling">Travelling

      </div>
      <span class="text-danger" id="hobbyerr"></span><br>
      <div class="form-group">
        <label for="profile_image">Profile Image</label>
        <input type="file" id="profile_image" name="profile_image">

      </div>
      <span class="text-danger" id="pimagerr"></span><br>
      <button type="submit" class="btn btn-success">Insert</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#insertForm").submit(function(event) {
        event.preventDefault();
        $.ajax({
          url: "insert_action.php",
          type: "POST",
          data: $(this).serialize(),
          success: function(response) {
            alert(response);
          }
        });

      });
      $("#insertForm").submit(function(event) {
        // Clear previous error messages
        $(".error").html("");

        // Validate username
        var first_name = $("#first_name").val();
        if (first_name === "") {
          $("#fnamerr").html("firstname is required");
          event.preventDefault();
        } else {
        $first_name = test_input($_POST['first_name']);
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
        // Validate password
        var password = $("#password").val();
        if (password === "") {
          $("#passworderr").html("Password is required");
          event.preventDefault();
        } else if (password.length < 6) {
          $("#passworderr").html("Password must be at least 6 characters");
          event.preventDefault();
        }

        // Validate Conform password
        var coonfirm_password = $("#confirm_password").val();
        if (coonfirm_password === "") {
          $("#confirmpwderr").html("Password is required");
          event.preventDefault();
        } else if (confirm_password != password) {
          $("#confirmpwderr").html("Password must be same as above password");
          event.preventDefault();
        }

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