<table id="mytable" border="1" class="table table-bordred table-striped">
    <tr>
        <th>Profile Image</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Gender</th>
        <th>Hobby</th>
        <th>Country</th>
        <th>Actions</th>
    </tr>
    <?php
    $fetchdata = new DB_con();
    $sql = $fetchdata->fetchdata();
    $cnt = 1;
    while ($row = mysqli_fetch_array($sql)) {
    ?>
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
                <a class="btn btn-primary" href="update.php?id=<?php echo $row['id']; ?> "> Update</a>
                <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
            </td>
        </tr>

    <?php

        $cnt++;
    } ?>
</table>
</div>
</div>
</div>
</div>
</div>


</table>