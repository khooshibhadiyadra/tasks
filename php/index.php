<?php
include 'conn.php';
$message = '';
$fetchdata = new DB_con();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $first_name = $_POST['first_name'];
    $id = $_POST['id'];
    $searchResults = $fetchdata->filterTable($first_name, $id);
    if (mysqli_num_rows($searchResults) > 0) {
        // $message = "Records found!";
    }
     else {
        $message = "No records found!";
    }
}
?>

<table id="mytable" border="1" class="table table-bordered table-striped">
    <tr>
        <th>Profile Image</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Subject</th>
        <th>Language</th>
        <th>Actions</th>
    </tr>
    <?php

    if (isset($searchResults)) {
        while ($row = mysqli_fetch_array($searchResults)) {
    ?>
            <tr>
                <td><img src="uploads/<?php echo $row['profile_image']; ?>" width="100"></td>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['language']; ?></td>
                <td><?php echo $row['subject']; ?></td>
                <td>
                    <a class="btn btn-primary" href="update.php?id=<?php echo $row['id']; ?>">Update</a>
                    <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
    <?php
        }
    }
    ?>
    Search for the records:
<form method="post">
    <input type="text" placeholder="First Name" name="first_name" value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : ''; ?>" />
    <input type="text" placeholder="ID" name="id" value="<?php echo isset($_POST['id']) ? $_POST['id'] : ''; ?>" />
    <button type="submit">Search</button>
</form>

<?php if ($message): ?>
    <p><?= $message ?></p>
<?php endif; ?>



</div>
</div>
</div>
</div>
</div>
</table>
