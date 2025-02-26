<?php
header('Content-Type: application/json');
include("con.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$response = [];
$id=$_POST['id'];
// print_r($_GET['id']);
// exit;
$sql = "DELETE FROM users WHERE id=$id";
echo $sql;

if (mysqli_query($conn, $sql)) {
    $response = ["status" => "success", "message" => "user deleted"];
} else {
    $response = ["status" => "error", "message" => "Error in deleting data"];
}

echo json_encode($response);
?>

<script>
    $("body").on("click", ".delete", function(response) {
        alert("hello");
    });
    $.ajax({
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
            console.log("err", response);
            if (response.status === 'success') {
                alert(response.message);
                window.location.href = "display.php";
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

    });
</script>