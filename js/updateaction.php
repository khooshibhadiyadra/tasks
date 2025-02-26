<?php 
header('Content-Type: application/json');
include ("con.php");

$response = [];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $hobbies = isset($_POST['hobbies']) ? implode(",",$_POST['hobbies']) : '';
    $country = $_POST['country'];

    $errors = [];

    if(empty($first_name))
    {
        $errors['first_name'] = "first name is required";
   
    }

    if(empty($last_name))
    {
        $errors['last_name'] = "last name is required";
    }

    if(empty($email))
    {
        $errors['email'] = "email is required";
    }

    if(empty($address))
    {
        $errors['address'] = "address is required";
    }

    if(empty($phone))
    {
        $errors['phone'] = "phone number is required";
    }else if(!preg_match("/^[0-9]{10}$/",$phone))
    {
        $errors['phone'] = "phone number must be 10 digit";
    }

    if (empty($gender)) {
        $errors['gen'] = "Gender is Required";
    }

    if (empty($hobbies)) {
        $errors['hob'] = "Hobbies is Required";
    }
    if(empty($country))
    {
        $errors['country'] = "country is required";
    }

    $profile_image="";
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
        $profile_image = $_FILES['profile_image']['name'];
        $target_dir = "uploads/";
        move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_dir . $profile_image);
    } else {
        $errors['profile_image']="profile image is required";
        // $response = ["status" => "error" , "message" => "file not uploaded"];
        // echo json_encode($response);    
        // exit;

    }


    if(empty($errors))
    {
        $sql = "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email', address='$address', 
                phone='$phone', gender='$gender', hobbies='$hobbies', country='$country',profile_image='$profile_image'";

            if(!empty($filename))
            {
                $sql .=", file='$filename'";
            }
        $sql .= "WHERE id='$id'";
        if(mysqli_query($conn,$sql))
        {
            $response = ["status" => "success" , "message" => "succefully updated"];
        }
        else{
            $response = ["status" => "error" , "message" => "Error in updating data"];
        }
    }
    else{
        $response['errors']=$errors;
    }
}
echo json_encode($response);
exit;