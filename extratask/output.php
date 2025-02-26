<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $arr = [1, 2, 3, 4, 5];
    $inputValue = $_POST['inputValue'];
    $message = "not found";
    foreach ($arr as $item) {
        if ($item == $inputValue) {
            $message = "match";
            break;
        }
    }
}
?>
<html>
<body>
    <form method="post">
        enter number
        <input type="number" name="inputValue">
        <button type="submit">Check</button>
    </form>
    <?php if (isset($message)): ?>
        <p><?= $message ?></p>
    <?php endif; ?>

</body>
</html>
