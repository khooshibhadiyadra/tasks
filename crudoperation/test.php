<?php

require_once "config.php";

$firstname_err = $lastname_err = $password_err =$confirmpassword_err=$phone_err=$address_err=
$email_err=$gender_err=$hobby_err=$country_err=$profileimage_err="";
$first_name = $last_name =$password = $confirm_password =$phone=$address =$email = $gender =
$hobby =$country=$profile_image = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if(empty(trim($_POST["first_name"]))){
    $firstname_err="required";
  }
  else{
    $first_name=ucfirst(trim($_POST["first_name"]));
    if(!ctype_alpha($first_name)){
        $firstname_err="invalid";
    }
  }
  if (empty(trim($_POST["last_name"]))) {
    $lastname_err = "This field is required.";
  } else {
    $last_name = ucfirst(trim($_POST["last_name"]));
    if (!ctype_alpha($last_name)) {
      $lastname_err = "Invalid name format.";
    }
  }
  if (empty(trim($_POST["password"]))) {
    $password_err = "This field is required.";
  } else {
    $password = ucfirst(trim($_POST["password"]));
    if (!ctype_alpha($password)) {
      $password_err = "Invalid name format.";
    }
  }
  if (empty(trim($_POST["confirm_password"]))) {
    $confirmpassword_err = "This field is required.";
  } else {
    $confirm_password = ucfirst(trim($_POST["confirm_password"]));
    if (!ctype_alpha($confirm_password)) {
      $confirmpassword_err = "Invalid name format.";
    }
  }
  if (empty($_POST["phone"])) {
    $phone_err = "This field is required.";
  } else {
    $phone = $_POST["phone"];
  }

  if (empty(trim($_POST["address"]))) {
    $address_err = "This field is required.";
  } else {
    $address = ucfirst(trim($_POST["address"]));
    if (!ctype_alpha($address)) {
      $address_err = "Invalid name format.";
    }
  }

  if (empty(trim($_POST["email"]))) {
    $email_err = "This field is required.";
  } else {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_err = "Please enter a valid email address.";
    }
  }

  if (empty($_POST["gender"])) {
    $gender_err = "This field is required.";
  } else {
    $gender = $_POST["gender"];
  }
  if (empty($_POST["hobby"])) {
    $hobby_err = "This field is required.";
  } else {
    $hobby = $_POST["hobby"];
  }


  if (empty($_POST["country"])) {
    $country_err = "This field is required.";
  } else {
    $country = $_POST["country"];
  }
  
  if (empty($_POST["profile_image"])) {
    $profileimage_err = "This field is required.";
  } else {
    $profile_image = $_POST["profile_image"];
    
  }


  if (empty($firstname_err) && empty($lastname_err) && empty($password_err) && empty($confirmpassword_err) && empty($phone_err) && 
  empty($address_err) && empty($email_err) && empty($gender_err) && empty($hobby_err) && empty($country_err) && empty($profileimage_err)) {
   
    $sql = "INSERT INTO employees (first_name, last_name, password,confirm_password,phone,address,email, gender, hobby, country,profile_image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
    
      mysqli_stmt_bind_param($stmt, "ssssissssss", $param_fname, $param_lname,$param_password,$param_confirmpassword,
    $param_phone,$param_address,$param_email,$param_gender,$param_hobby,$param_country,$param_profile_image );

      $param_fname = $first_name;
      $param_lname = $last_name;
      $param_password=$password;
      $param_confirmpassword=$confirm_password;
      $param_phone=$phone;
      $param_address=$address;
      $param_email = $email;
      $param_gender = $gender;
      $param_hobby = $hobby;
      $param_country=$country;
      $param_profile_image=$profile_image;

      if($confirm_password!=$password){
        echo "password not match";
      }
      else{
        echo "password match";
      }
      if (mysqli_stmt_execute($stmt)) {
      
        echo "<script>" . "alert('New record created successfully.');" . "</script>";
        echo "<script>" . "window.location.href='./'" . "</script>";
  
        
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }
    }

    mysqli_stmt_close($stmt);
  }
  else{
    echo "password not match";
    header ("index.php");
  }

  # Close connection
  mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css">
  <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
  <title>PHP CRUD Operations</title>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-6">
   
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="bg-light p-4 shadow-sm" method="post" novalidate>
        

          <div class="row gy-3">
            <div class="col-lg-6">
              <label for="first_name" class="form-label">First Name</label>
              <input type="text" class="form-control" name="first_name" id="first_name" value="<?= $first_name; ?>">
              <small class="text-danger"><?= $firstname_err; ?></small>
            </div>
            <div class="col-lg-6">
              <label for="last_name" class="form-label">Last Name</label>
              <input type="text" class="form-control" name="last_name" id="last_name" value="<?= $last_name; ?>">
              <small class="text-danger"><?= $lastname_err; ?></small>
            </div>
            <div class="col-lg-6">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" name="password" id="password" value="<?= $password; ?>">
              <small class="text-danger"><?= $password_err; ?></small>
            </div>
            <div class="col-lg-6">
              <label for="confirm_password" class="form-label">confirmpassword</label>
              <input type="password" class="form-control" name="confirm_password" id="confirm_password" value="<?= $confirm_password; ?>">
              <small class="text-danger"><?= $confirmpassword_err; ?></small>
            </div>
            <div class="col-lg-6">
              <label for="phone" class="form-label">phone</label>
              <input type="text" class="form-control" name="phone" id="phone" value="<?= $phone; ?>">
              <small class="text-danger"><?= $phone_err; ?></small>
            </div>
            <div class="col-lg-6">
              <label for="address" class="form-label">address</label>
              <input type="text" class="form-control" name="address" id="address" value="<?= $address; ?>">
              <small class="text-danger"><?= $address_err; ?></small>
            </div>
            <div class="col-lg-12">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control" name="email" id="email" value="<?= $email; ?>">
              <small class="text-danger"><?= $email_err; ?></small>
            </div>
            <div class="col-lg-6">
              <label for="gender" class="form-label">Gender</label>

                <input type="radio" name="gender" value="Male" <?= (isset($gender) && $gender == "Male") ? "selected" : ""; ?>>Male</option>
                <input type="radio"  name="gender" value="Female" <?= (isset($gender) && $gender == "Female") ? "selected" : ""; ?>>Female</option>
               

              <small class="text-danger"><?= $gender_err; ?></small>
            </div>
            <div class="col-lg-6">
                <label for="hobby" class="form-label">hobby</label>
                <input type="checkbox" name="hobby" value="read" <?= (isset($hobby) && $hobby == "read") ? "selected" : ""; ?>>read</option>
                <input type="checkbox"  name="hobby" value="write" <?= (isset($hobby) && $hobby == "wrie") ? "selected" : ""; ?>>write</option>

            </div>
            <div class="col-lg-6">
              <label for="country" class="form-label">country</label>
              <select name="country" class="form-select" id="country">
                <option selected disabled>Select country</option>
                <option value="india" <?= (isset($country) && $country == "india") ? "selected" : ""; ?>>
             india
                </option>
                <option value="germany" <?= (isset($country) && $country == "germany") ? "selected" : ""; ?>>
                 germany
                </option>
                <option value="france" <?= (isset($country) && $country == "france") ? "selected" : ""; ?>>
               france
                </option>
                <option value="canada" <?= (isset($country) && $country == "canada") ? "selected" : ""; ?>>
                  canada
                </option>
              </select>
              <small class="text-danger"><?= $country_err; ?></small>
            </div>
            <div class="col-lg-6">
              <label for="profile_image" class="form-label">ProfileImage</label>
              <input type="file" class="form-control" name="profile_image" id="profile_image" value="<?= $profile_image; ?>">
              <small class="text-danger"><?= $profileimage_err; ?></small>
            </div>
            <div class="col-lg-12 d-grid">
              <button type="submit" class="btn btn-primary">Add Employee</button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</body>

</html>


