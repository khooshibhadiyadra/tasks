<?php 
include 'con.php';
include 'store.php';
?>
<form method="post">
    <div class="row">
        <div class="col-md-4">
            First Name: <input class="form-control" type="text" name="first_name">
        </div>
        <div class="col-md-4">
            Last Name: <input class="form-control" type="text" name="last_name">
        </div>
        <div class="col-md-4">
            Email: <input class="form-control" type="text" name="email">
        </div>
        <div class="col-md-4">
            Password <input class="form-control" type="password" name="password">
        </div>
        <div class="col-md-4">
            Confirm Password: <input class="form-control" type="text" name="confirm_password">
        </div>
        <div class="col-md-4">
            Phone: <input class="form-control" type="text" name="phone">
        </div>
        <div class="col-md-4">
            Address:
            <textarea name="address" class="form-control"></textarea>
        </div>
        <div class="col-md-4">
            Gender:
            <input type="radio" name="gender" value="Male"> Male
            <input type="radio" name="gender" value="Female" > Female
        </div>
        <div class="col-md-4">
            <?php
            // $hobbies = $_POST['hobbies'];
            // $hobbie = explode(",", $hobbies);
            ?>
            Hobby:
            <input type="checkbox" name="hobbies[]" value="Reading" >Reading
            <input type="checkbox" name="hobbies[]" value="Travelling" >Travelling
            <input type="checkbox" name="hobbies[]" value="Sports" >Sports
        </div>
        <div class="col-md-4">
            Country:
            <select name="country">
                <option value="">Select</option>
                <option value="India" >India</option>
                <option value="Germany" >Germany</option>
                <option value="Canada">Canada</option>
            </select>
        </div>
        <div class="col-md-4">
            Profile Image:
            <input type="file">

        </div>


    </div>
    <div class="col-md-4">
            <input type="submit" name="submit" id="submit" value="submit">
        </div>
        </form>