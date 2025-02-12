<?php

$con = mysqli_connect("localhost", "root", "admin123", "ajax_crudtest");

$action = $_POST["action"];
if ($action == "Insert") {
    $first_name = mysqli_real_escape_string($con, $_POST["first_name"]);
    $last_name = mysqli_real_escape_string($con, $_POST["last_name"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $address = mysqli_real_escape_string($con, $_POST["address"]);
    // $phone = mysqli_real_escape_string($con, $_POST["phone"]);
    // $gender = mysqli_real_escape_string($con, $_POST["gender"]);
    // $hobbies = mysqli_real_escape_string($con, $_POST["hobbies"]);
    // $country = mysqli_real_escape_string($con, $_POST["country"]);
    // $profile_image = mysqli_real_escape_string($con, $_FILES["profile_image"]);
    $sql = "insert into users (first_name,last_name,password,email,address) values 
    ('{$first_name}','{$last_name}','{$password}','{$email}','{$address}') ";
    if ($con->query($sql)) {
        $ID = $con->insert_id;
        echo "
        <tr uid='{$ID}'>
        <td>{$first_name}</td>
        <td>{$last_name}</td>
        <td>{$password}</td>
        <td>{$email}</td>
        <td>{$address}</td>
        
          
          <td><a href='#' class='btn btn-primary edit'>Edit</a></td>
          <td><a href='#' class='btn btn-danger delete'>Delete</a></td>
        </tr>";
    } else {
        echo false;
    }
}
