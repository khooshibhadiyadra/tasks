<!-- 
// session_start();
// include 'conn.php';
// include 'header.php';
// include 'sidebar.php';

// if (isset($_SESSION['email'])) {
    // echo $_SESSION['email'];
//     $query = "SELECT first_name, last_name FROM users WHERE email = '$email'";
//     $result = $conn->query($query);
//     echo $result;
// } else {
//     echo "dd";
//     exit;
// } -->

<?php
session_start();
include 'conn.php';
include 'header.php';
include 'sidebar.php';
if (isset($_SESSION['email'])) {
    print_r($_SESSION);
    $email = $_SESSION['email']; 

$query="SELECT first_name,last_name FROM users WHERE email='$email'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $user = $result->fetch_assoc();
        $first_name = $user['first_name'];
        $last_name = $user['last_name'];     
        echo "Hello, " . $first_name . " " . $last_name;
}
    // $query = $conn->prepare("SELECT first_name, last_name FROM users WHERE email = ?");
    // $query->bind_param("s", $email); 
    // $query->execute();
    // $result = $query->get_result();

    // $query = "SELECT first_name, last_name FROM users WHERE email = ?";
    // $result=$conn->query($query);
    // $sql = $result->fetch_assoc();

    // if ($result->num_rows > 0) {
    //     $user = $result->fetch_assoc();
    //     $first_name = $user['first_name'];
    //     $last_name = $user['last_name'];


     
    //     echo "Hello, " . $first_name . " " . $last_name;
    //     // include 'list.php';

    // } 
    else {
        echo "User not found.";
    }
} else {
    echo "Please log in.";
    exit;
}

// include 'footer.php';

// $id = $_POST['id'];
// $first_name = $_POST['first_name'];
// $last_name = $_POST['last_name'];
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// include 'conn.php';
// include 'header.php';
// include 'sidebar.php';
// if (!isset($_SESSION['email'])) {

//     header("Location: login.php");
//     include 'footer.php';
// }
// $query="SELECT first_name FROM users WHERE id=$id";
// $_SESSION['first_name'] = $first_name;
// $_SESSION['last_name']=$last_name;

include 'footer.php';