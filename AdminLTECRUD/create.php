<?php include 'header.html'; 

include 'sidebar.php';

include 'conn.php';

$query = "SELECT * FROM users";
$result = $conn->query($query);
?>
 

<?php  header("htmlstyle.html");?>
    <title>Add User</title>

<body>
<div class="card card-primary">
    <div class="card-header">
    <h2 class="card-title">Add New User</h2>
    </div>
    <div class="card-body">
    <form action="store.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
        First Name: <input class="form-control" type="text" name="first_name" required>
        </div>
        <div class="form-group">
        Last Name: <input  class="form-control" type="text" name="last_name" required>
        </div>
        <div class="form-group">
        Email: <input  class="form-control" type="email" name="email" required>
        </div>
        <div class="form-group">
        Password: <input class="form-control" type="password" name="password" required>
        </div>
        <div class="form-group">
        Confirm Password: <input class="form-control" type="password" name="confirm_password" required>
</div>
<div class="form-group">
        Phone: <input class="form-control" type="text" name="phone" required><br>
        </div>
        <div class="form-group">
        Address: <textarea name="address" class="form-control" required></textarea><br>
</div>
<div class="form-group">
        Gender: 
        <input type="radio" name="gender" value="Male" required> Male
        <input type="radio" name="gender" value="Female" required> Female<br>
</div>
<br>
<div class="form-group">
        Hobbies: 
        <input type="checkbox" name="hobbies[]" value="Reading"> Reading
        <input type="checkbox" name="hobbies[]" value="Travelling"> Travelling
        <input type="checkbox" name="hobbies[]" value="Sports"> Sports<br>
        </div>
        <br>
        <div class="form-group">
        Country: 
        <select name="country" required>
            <option value="">Select</option>
            <option value="India">India</option>
            <option value="germany">germany</option>
            <option value="canada">canada</option>
        </select>
        
        </div>
        <br>
        <div class="form-group">
        Profile Image: <input type="file" name="profile_image" required>
</div>
<br>
<div class="form-group">
        <button class="btn btn-block btn-primary btn-lg" type="submit">Submit</button>
</div>
</div>
    </form>
    </div>
</body>
</html>
<?php include 'footer.html';?>