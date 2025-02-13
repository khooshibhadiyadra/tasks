<?php

$con = mysqli_connect("localhost", "root", "admin123", "ajax_crudtest");
?>
<div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Hobbies</th>
                <th>Country</th>
                <th>Profile Image</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $sql = "SELECT * FROM users";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                echo 
                "<tr uid='{$row["id"]}'>
                <td>{$row["first_name"]}</td>
                <td>{$row["last_name"]}</td>
                <td>{$row["email"]}</td>
                <td>{$row["phone"]}</td>
                <td>{$row["address"]}</td>
                <td>{$row["gender"]}</td>
                <td>{$row["hobbies"]}</td>
                <td>{$row["country"]}</td>
                <td>{$row["profile_image"]}</td>
                <td><a href='update.php?id={$row["id"]}' class='btn btn-primary'>Edit</a>
                <a href='delete.php?id={$row["id"]}' class='btn btn-danger delete' data-id='{$row["id"]}'>Delete</a></td>
                </tr>";
                }
            } else {
                echo "No records found.";
            }
            ?>
    </table>