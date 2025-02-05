<!DOCTYPE HTML>
        <html>
       <head>
        <title>Register</title>
       </head>
       <body>
        <form action="" method="POST">
        Name: 
        <input type="text" name="name">
        <br/> <br/>
        Username: 
        <input type="text" name="username">
        <br/> <br/>
        Password:
        <input type="password" name="password">
        <br/> <br/>

        Email: 
        <input type="text" name="email">
        <br/> <br/>
        <input type="submit" name="submit" value="Register">
    </form>
</body>
  </html>
   <?php
  require('conn.php');
  require('testvalidation.php');
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

$email = $_POST['email'];

   if(isset($_POST["submit"])){
    if($query = mysqli_query($connect,"INSERT INTO users 
 (`id`,`name`,`username`, `password`, `email`) VALUES ('','".$name."', 
    '".$username."', '".$password."', '".$email."')")){
        echo "Success";
    }else{
        echo "Failure" . mysqli_error($connect);
      }
      }
 ?>