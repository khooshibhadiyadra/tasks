<?php 
include 'conn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // print_r($_POST);
    // exit;
header("location:register.php");
}
?>
<form  method="POST">
        <div class="form-group">
        First Name: <input class="form-control" type="text" name="first_name">
<button type="submit" >submit</button>
        </div>
</form>