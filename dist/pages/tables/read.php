// read.php

<?php
require_once 'db.php';

$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Task: " . $row["task"]. " - Progress: " . $row["progress"]. " - Label: " . $row["label"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>