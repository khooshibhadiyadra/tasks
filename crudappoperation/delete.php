<?php
include 'conn.php';

$id = $_GET['id'];
$query = "DELETE FROM users WHERE id = $id";
$conn->query($query);

header("Location: index.php");
?>