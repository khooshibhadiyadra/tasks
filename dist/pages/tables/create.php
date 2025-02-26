<!DOCTYPE html>
<html>
<head>
<style>
    .card-primary:not(.card-outline)>.card-header {
    background-color: #007bff;
    color:white;
    --font-family-sans-serif: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
}
.form-group{
    font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
}
.form-control {
    display: block;
    width: 100%;
    height: calc(2.25rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    box-shadow: inset 0 0 0 transparent;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}
.card-primary:not(.card-outline)>.card-header {
    background-color: #007bff;
    color: white;
    --font-family-sans-serif: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
    height: 36px
font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
.btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
    box-shadow: none;
}
</style>
    <title>Add User</title>
</head>
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
        Profile Image: <input type="file" name="profile_image" required><br>
        <button class="btn btn-block btn-primary btn-lg" type="submit">Submit</button>
</div>
    </form>
    </div>
</body>
</html>
