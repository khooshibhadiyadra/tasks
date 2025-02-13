<?php

$con=mysqli_connect("localhost","root","admin123","ajax_crud");

$sql = "SELECT * FROM users";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr uid='{$row["ID"]}'>
                <td>{$row["NAME"]}</td>
                <td>{$row["GENDER"]}</td>
                <td>{$row["CONTACT"]}</td>
                <td><a href='#' class='btn btn-primary edit'>Edit</a></td>
                <td><a href='#' class='btn btn-danger delete'>Delete</a></td>
              </tr>";
    }
} else {
    echo "No records found.";
}
