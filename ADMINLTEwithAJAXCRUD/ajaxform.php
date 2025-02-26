<?php 
include 'oopheader.php';
include 'sidebar.php';
include 'ajaxcon.php';
?>
<html>
    <head>
        <title>User Form</title>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>   
    </head>
    <body>
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">user Details</div>
                <form id="userform" method="POST" enctype="multipart/form-data">
                    <div class="card-body">

                        <div class="mb-3">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label>Phone Number</label>
                            <input type="number" name="phone" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label>Gender</label>
                            <div>
                                <input type="radio" name="gender" value="Male">Male
                                <input type="radio" name="gender" value="Female">Female
                            </div>
                                <input type="hidden" name="gen">
                        </div>

                        <div class="mb-3">
                            <label>Hobbies</label>
                            <div>
                                <input type="checkbox" name="hobbies[]" value="reading">reading
                                <input type="checkbox" name="hobbies[]" value="writing">writing
                            </div>
                                <input type="hidden" name="hob">
                        </div>

                        <div class="mb-3">
                            <label>Country</label>
                            <select name="country" class="form-control">
                                <option value="">Please Select One Country</option>
                                <option value="India">India</option>
                                <option value="germany">germany</option>
                                <option value="canada">canada</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Profile Image</label>
                            <input type="file" name="profile_image" class="form-control" />
                        </div>
                        
                    </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </form>
            </div>
        </div>
        <script>
    $(document).ready(function () {
    $("#userform").on("submit", function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    $(".error-message").remove();

    $.ajax({
        url: "ajaxadd.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType : "json",
        success: function (response) {
        if (response.status === "success") {
            alert(response.message);
            window.location.href = "ajaxdisplay.php";
            $("#userform")[0].reset();
        } else if (response.errors) {

            $.each(response.errors, function (key, message) {
            $(`[name="${key}"]`).after(`<span class="error-message text-danger">${message}</span>`);
            });
        } else {
            alert(response.message);
        }
        },
        error: function (xhr) {
        alert("Error: " + xhr.responseText);
        }
    });
    });
    });

        </script>
    <footer>
        <?php include "footer.php"; ?>
      </footer>
    </body>
</html>