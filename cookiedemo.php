<?php 
//cookie
// setcookie(name,value,expiry,path,domain,secure,httponly)

$cookie_name="xyz";
$cookie_value="demo";
setcookie($cookie_name,$cookie_value,time()+2400,"/");
?>
<html>
    <body>
        <?php 
        if(!isset($_COOKIE[$cookie_name])){
   
            echo "cookie name is unset and cookie value is unset";
        }
        else{
echo "cooke name is ".$_COOKIE[$cookie_name];
           
        }
        
        ?>
    </body>
</html>



?>

Toggle Sidebar
Toggle theme

New
You

php
Insert Code
Run
Copy code
<html>
    <title>

    </title>
    <body>
        <form action="registeration_database.php" method="POST">
            <h1>Registration Form</h1> 
            First Name:<input type="first_name" id="f_name"><br>
give 1 suggestion to continue this code. give code only.

BLACKBOXAI

php
Insert Code
Run
Copy code
Last Name:<input type="text" id="l_name" name="last_name"><br>
Email:<input type="email" id="email" name="email"><br>
Password:<input type="password" id="password" name="password"><br>
Confirm Password:<input type="password" id="confirm_password" name="confirm_password"><br>
<input type="submit" value="Register">
</form>
</body>
</html>
You

here in this when submit is clicked it should be perform in database here is the db code <?php $servername="localhost"; $username="root"; $password="admin123"; $database="registeration_data";

$conn=mysqli_connect($servername,$username,$password,$database); if($conn->connect_error){ echo "connection not establised"; } else{ echo "connection established";

} $conn->close(); ?>


<?php
$servername = "localhost";
$username = "root";
$password = "admin123";
$database = "registeration_data";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error) {
    echo "Connection not established";
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];

        if ($password == $confirm_password) {
            $sql = "INSERT INTO registration (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";
            if ($conn->query($sql) === TRUE) {
                echo "Registration successful";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Passwords do not match";
        }
    }
}

$conn->close();
?>
HTML Form

php
Insert Code
Run
Copy code
<html>
    <title>Registration Form</title>
    <body>
        <form action="registeration_database.php" method="POST">
            <h1>Registration Form</h1>
            First Name:<input type="text" id="f_name" name="first_name"><br>
            Last Name:<input type="text" id="l_name" name="last_name"><br>
            Email:<input type="email" id="email" name="email"><br>
            Password:<input type="password" id="password" name="password"><br>
            Confirm Password:<input type="password" id="confirm_password" name="confirm_password"><br>
            <input type="submit" value="Register">
        </form>
    </body>
</html>

