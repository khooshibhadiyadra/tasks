<!DOCTYPE html>
<html lang="en">
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<head>
    <title>jQuery Ajax CRUD with PHP-MySQL</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
    <div class="modal" tabindex="-1" role="dialog" id='modal_frm'>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">User Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id='frm'>
                        <input type='hidden' name='action' id='action' value='Insert'>
                        <input type='hidden' name='ID' id='uid' value='0'>
                        <div class='form-group'>
                            <label>First Name</label>
                            <input type='text' name='first_name' id='first_name' required class='form-control'>
                        </div>
                        <div class='form-group'>
                            <label>Last Name</label>
                            <input type='text' name='last_name' id='last_name' required class='form-control'>
                        </div>
                        <div class='form-group'>
                            <label>Password</label>
                            <input type='password' name='password' id='password' required class='form-control'>
                        </div>
                        <div class='form-group'>
                            <label>Confirm Password</label>
                            <input type='password' name='confirm_password' id='confirm_password' required class='form-control'>
                        </div>
                        <div class='form-group'>
                            <label>Email</label>
                            <input type='text' name='email' id='email' required class='form-control'>
                        </div>
                        <div class='form-group'>
                            <label>Address</label>
                            <textarea name="address" id="address"></textarea>
                        </div>
                        <div class='form-group'>
                            <label>Gender</label>
                            <input type="radio" name="gender" value="male">Male
                            <input type="radio" name="gender" value="female">female
                        </div>
                        <div class='form-group'>
                            <label>Hobby</label>
                            <input type="checkbox" name="hobbies[]" value="Reading">Reading
                            <input type="checkbox" name="hobbies[]" value="Writing">Writing
                        </div>
                        <div class='form-group'>
                            <label>Country</label>
                            <select name="country" id="country">
                                <option value="india">india</option>
                                <option value="germany">germany</option>
                                <option value="canada">canada</option>
                            </select>
                        </div>
                        <div class='form-group'>
                            <label>Profile Image</label>
                            <input type="file" name="profile_image">
                        </div>
                        <input type='submit' value='Submit' class='btn btn-success'>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class='container mt-5'>
        <p class='text-right'><a href='#' class='btn btn-success' id='add_record'>Add Record</a></p>

        <!-- <table class='table table-bordered'>
    <thead>
      <th>Name</th>
      <th>lastname</th>
      <th>password</th>
      <th>email</th>
      <th>Edit</th>
      <th>Delete</th>
    </thead>
    <tbody id='tbody'>

    </tbody>
    </table> -->
    </div>
    <script>
        $(document).ready(function() {
            var current_row = null;
            $("#add_record").click(function() {
                $("#modal_frm").modal();
            });

            $("#frm").submit(function(event) {
                event.preventDefault();
                $.ajax({
                    url: "insert_action.php",
                    type: "post",
                    data: $("#frm").serialize(),
                    beforeSend: function() {
                        $("#frm").find("input[type='submit']").val('Loading...');
                    },
                    success: function(res) {
                        if (res) {
                            if ($("#uid").val() == "0") {
                                $("#tbody").append(res);
                            } else {
                                $(current_row).html(res);
                            }
                        } else {
                            alert("Failed Try Again");
                        }
                        $("#frm").find("input[type='submit']").val('Submit');
                        clear_input();
                        $("#modal_frm").modal('hide');
                    }
                });
            });

            function clear_input() {
                $("#frm").find(".form-control").val("");
                $("#action").val("Insert");
                $("#uid").val("0");
            }
        });
    </script>
</body>

</html>