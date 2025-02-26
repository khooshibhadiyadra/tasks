<?php
$con=mysqli_connect("localhost","root","admin123","ajax_crudtest");
$id = $_POST['uid'];
$sql = "DELETE FROM users WHERE ID = '$id'";
if ($con->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

