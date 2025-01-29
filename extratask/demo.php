<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $array = [1, 2, 3, 4, 5];
    $inputval = $_POST['inputval'];
    $msg = "";
    foreach ($array as $val) {
        if ($val == $inputval) {
            $msg = "found";
            break;
        }
    }
}
?>
<html>

<body>
    <form method="post">
        <input type="text" name="inputVal">
        <button type="submit">submit</button>

    </form>
</body>

</html>
