<?php
include "oopheader.php";
include "sidebar.php";
include "ajaxcon.php";
$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM users WHERE id = $id");
if ($result && $result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    die("user not found");
}
?>
<html>

<head>
    <title>Updating Data</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Updating Details</div>
        </div>
        <form id="updatedata" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <input type="hidden" id="id" name="id" value="<?php echo $user['id']; ?>">

                <div class="mb-3">
                    <label>First Name</label>
                    <input type="text" name="first_name" value="<?php echo $user['first_name']; ?>" class="form-control" />
                    <?php if (!empty($error['first_name'])): ?>
                        <p style='color:red;'><?php echo $error['first_name'] ?></p>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label>Last Name</label>
                    <input type="text" name="last_name" value="<?php echo $user['last_name']; ?>" class="form-control" />
                    <?php if (!empty($error['last_name'])): ?>
                        <p style='color:red;'><?php echo $error['last_name'] ?></p>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo $user['email']; ?>" class="form-control" />
                    <?php if (!empty($error['email'])): ?>
                        <p style='color:red;'><?php echo $error['email'] ?></p>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label>Address</label>
                    <input type="text" name="address" value="<?php echo $user['address']; ?>" class="form-control" />
                    <?php if (!empty($error['address'])): ?>
                        <p style='color:red;'><?php echo $error['address'] ?></p>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label>Phone Number</label>
                    <input type="number" name="phone" value="<?php echo $user['phone']; ?>" class="form-control" />
                    <?php if (!empty($error['phone'])): ?>
                        <p style='color:red;'><?php echo $error['phone'] ?></p>
                    <?php endif; ?>
                </div>


                <div class="mb-3">
                    <label name="gender">Gender</label>
                    <div>
                        <input type="radio" name="gender" value="Male" <?php echo $user['gender'] == 'Male' ? 'checked' : '' ?>> Male
                        <input type="radio" name="gender" value="Female" <?php echo $user['gender'] == 'Female' ? 'checked' : '' ?>> Female
                    </div>
                    <input type="hidden" name="gen">
                </div>
                <div class="mb-3">
                    <label>Hobbies</label>
                    <div>
                        <input type="checkbox" name="hobbies[]" value="reading" <?php echo strpos($user['hobbies'], 'reading') !== false ? 'checked' : ''; ?>>reading
                        <input type="checkbox" name="hobbies[]" value="writing" <?php echo strpos($user['hobbies'], 'writing') !== false ? 'checked' : ''; ?>>writing
                    </div>
                    <input type="hidden" name="hob">
                </div>
                <div class="mb-3">
                    <label>Country</label>
                    <select name="country" class="form-control">
                        <option value="India" <?php echo ($user['country'] == 'India') ? 'selected' : ''; ?>>India</option>
                        <option value="germany" <?php echo ($user['country'] == 'germany') ? 'selected' : ''; ?>>germany</option>
                        <option value="canada" <?php echo ($user['country'] == 'canada') ? 'selected' : ''; ?>>canada</option>
                    </select>
                    <?php if (!empty($error['country'])): ?>
                        <p style='color:red;'><?php echo $error['country'] ?></p>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label>Updating Profile Image</label>
                    <input type="file" name="profile_image" accept="image/*" class="form-control" />
                    <img src="uploads/<?= htmlspecialchars($user['profile_image']) ?>" width="100" height="100" alt="profile image"><br>
                    <?php if (!empty($error['profile_image'])): ?>
                        <p style='color:red;'><?php echo $error['profile_image'] ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {

            $('#updatedata').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $(".error-message").remove();
                $.ajax({
                    url: "ajaxupdatedata.php",
                    type: "POST",
                    contentType: false,
                    processData: false,
                    data: formData,
                    dataType: "json",
                    success: function(response) {
                        if (response.status === 'success') {
                            alert(response.message);
                            window.location.href = "ajaxdisplay.php";
                        } else if (response.errors) {
                            $.each(response.errors, function(key, message) {
                                $(`[name="${key}"]`).after(`<span class="error-message text-danger">${message}</span>`);
                            });
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert("Error: " + xhr.responseText);
                    }
                })
            });
        });
    </script>
</body>
<?php include("footer.php"); ?>

</html>