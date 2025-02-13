<?php

$con=mysqli_connect("localhost","root","admin123","ajax_crudtest");

$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE ID = '$id'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    echo json_encode($user);
} else {
    echo json_encode([]);
}
