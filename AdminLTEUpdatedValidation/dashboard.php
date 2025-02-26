<?php 
session_start();
if (isset($_SESSION['email'])) {
    $sql="SELECT first_name ,last_name FROM users WHERE email=$_SESSION[email]";
    print_r ($sql);
    // print_r($_SESSION);
}


// $id = $_POST['id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
include 'conn.php';
include 'header.php';
include 'sidebar.php';
if (!isset($_SESSION['email'])) {

    header("Location: login.php");
}
// $query="SELECT first_name FROM users WHERE id=$id";
// $_SESSION['first_name'] = $first_name;
// $_SESSION['last_name']=$last_name;

include 'footer.php';
?>