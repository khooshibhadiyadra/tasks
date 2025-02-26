<?php 
$firstnameErr = $lastnameErr= $emailErr=$passwordErr=$confirmpasswordErr=$phoneErr=$addressErr=$genderErr=$hobbiesErr=$countryErr=$profileimageErr="";
$first_name =$last_name=$email=$password=$confirm_password=$phone=$address=$gender=$hobbies=$country=$profile_image="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
          if (empty($_POST["name"])) {     
                   $nameErr = "Please enter a valid name"; } else {
                               $name = test_input($_POST["name"]);   
?>

