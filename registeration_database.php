<?php 

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$servername="localhost";
$username="root";
$password="admin123";
$dbname="crudop";

$conn=mysqli_connect($servername,$username,$password,$dbname);
// echo "<pre>";
// print_r($conn->connect_error); exit;
// echo "</pre>";

if($conn->connect_error){
    die ("connection failed".$conn->connect_error);
    echo $conn->error;
}
$sql = "CREATE TABLE crudtest (
    first_name VARCHAR(50),
    last_name VARCHAR(30),
    email_address VARCHAR(30),
    password INT(50),
    confirm_password INT(50),
    address VARCHAR(50),
    phone_number INT(20),
    gender VARCHAR(10),
    hobby VARCHAR(20),
    country VARCHAR(20)
)";

// if($_SERVER["REQUEST_METHOD"]=="POST")
// {
     if(isset($_POST["submit"])){
        $first_name=$_POST["first_name"];
        $last_name=$_POST["last_name"];
        $email_address=$_POST["email_address"];
        $password=$_POST["password"];
        $confirm_password=$_POST["confirm_passwors"];
        $address=$_POST["address"];
        $phone_number=$_POST["phone_number"];
        $gender=$_POST["gender"];
        $hobby=$_POST["hobby"];
        $country=$_POST["country"];
    }

    if($password==$confirm_password){
        $query="INSERT INTO crudtest(first_name,last_name,email_address,password,confirm_password,address,phone_number,gender,hobby,country)
        VALUES ($first_name,$last_name,$email_address,$password,$confirm_password,$address,$phone_number
        ,$gender,$hobby,$country)";
        if($conn->query($query)===TRUE){
            echo "data inserted successfully";
        }
//         else{
//             echo "error".$query."".$conn->error;

//         }}
//     else{
// echo "password and confrim password do not match";
    }
//}
//     elseif(isset($_POST['update'])){
//         $id=$_POST['id'];
//         $first_name=$_POST['first_name'];
//         $last_name=$_POST['last_name'];
//         $email_address=$_POST['email_address'];
//         $password=$_POST['password'];
//         $confirm_password=$_POST['confirm_password'];
//         $address=$_POST['address'];
//         $phone_number=$_POST['phone_number'];
//         $gender=$_POST['gender'];
//         $hobby=$_POST['hobby'];
//         $country=$_POST['country'];
// $query="UPDATE crudtest SET first_name=$first_name,last_name=$last_name,email_address=
// $email_address,password=$password,confirm_password=$confirm_password,address=$address,phone_number=$phone_number,
// gender=$gender,hobby=$hobby,country=$country where id=$id";

// if($conn->query($query)===TRUE){
//     echo "data updated successfully";
// }
// else{
//     echo "error".$conn->error;

// }}
// elseif(isset($_POST['delete'])){
//     $id=$_POST["id"];
//     $query="DELETE FROM crudtest where id=$id";
//     if($conn->query($query)===TRUE){
//         echo "data deleted successfully";
//     }
//     else{
//         echo "error".$conn->error;
//     }
// }
$query="SELECT * FROM crudtest";
$result=$conn->query($query);
?>