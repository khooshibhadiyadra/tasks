<?php include 'header.html'; 

 include 'sidebar.php';?>

<?php
include 'conn.php';

$query = "SELECT * FROM users";
$result = $conn->query($query);
?>


<?php header("htmlstyle.html");?>
    <title>CRUD Application</title>

<body>
    <div class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-12">
    <div class= "card">

    </div>
<div class="card-header">
<h2>User List</h2>     
    </div>
   
    <div class="col-sm-12">
    <a  class="btn btn-success" href="create.php">Add New User</a>
    <table border="1" class="table table-bordered mt-3">
        
        <tr>
            <th >Profile Image</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>Hobby</th>
            <th>Country</th>
     
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><img src="uploads/<?php echo $row['profile_image']; ?>" width="100"></td>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['hobbies']; ?></td>
                <td><?php echo $row['country']; ?></td>
                <td>
                <a  class="btn btn-primary" href="update.php?id=<?php echo $row['id']; ?> "> Update</a>
                   
        
                    

                    <a  class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    </div>
    </div>
    </div>
    </div>
    </div>
   
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>



<?php include  'footer.html';?>