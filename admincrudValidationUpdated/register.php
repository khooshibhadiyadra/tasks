<link href="style.css" rel="stylesheet">
<div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md" style="margin-left: auto;margin-right: auto;width: 50%;" ;>
    <h2 class="text-2xl font-bold mb-6 text-center text-green-700">Register</h2>
    <form method="POST" enctype="multipart/form-data" action="registerdata.php">
        <?php
        session_start();
        if (isset($_SESSION['errors'])) {
            foreach ($_SESSION['errors'] as $field => $error) {
                // echo '<pre>';
                // print_r($field);
                // echo'</pre>';
                // echo "<p style='color:red;'>{$error}</p>"; 
            }
            // print_r($_SESSION['errors']);
        }
        ?>
        <div class="mb-4">
            <label for="first_name" class="block text-gray-700">First Name</label>
            <input type="text" id="first_name" name="first_name" class="w-full p-2 border border-gray-300 rounded-md" placeholder="First Name" value="<?= isset($_POST['first_name']) ? $_POST['first_name'] : (isset($_SESSION['old']['first_name']) ? $_SESSION['old']['first_name'] : '') ?>">
            <?php if (isset($_SESSION['errors']['first_name'])): ?>
                <p class="text-red-500"><?= $_SESSION['errors']['first_name'] ?></p>
            <?php endif; ?>
        </div>

        <div class="mb-4">
            <label for="last_name" class="block text-gray-700">Last Name</label>
            <input type="text" id="last_name" name="last_name" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Last Name" value="<?= isset($_POST['last_name']) ? $_POST['last_name'] : (isset($_SESSION['old']['last_name']) ? $_SESSION['old']['last_name'] : '') ?>">
            <?php if (isset($_SESSION['errors']['last_name'])): ?>
                <p class="text-red-500"><?= $_SESSION['errors']['last_name'] ?></p>
            <?php endif; ?>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Email" value="<?= isset($_POST['email']) ? $_POST['email'] : (isset($_SESSION['old']['email']) ? $_SESSION['old']['email'] : '') ?>">
            <?php if (isset($_SESSION['errors']['email'])): ?>
                <p class="text-red-500"><?= $_SESSION['errors']['email'] ?></p>
            <?php endif; ?>
        </div>

        <div class="mb-6">
            <label for="password" class="block text-gray-700">Password</label>
            <input type="password" id="password" name="password" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
            <?php if (isset($_SESSION['errors']['password'])): ?>
                <p class="text-red-500"><?= $_SESSION['errors']['password'] ?></p>
            <?php endif; ?>
        </div>

        <button type="submit" id="submit" name="submit" class="w-full bg-green-700 text-white p-2 rounded-md hover:bg-green-800">Register</button>
        <div class="text-center mt-4">
            <p class="text-gray-700">Already registered?</p>
            <a href="login.php" class="text-blue-500 hover:underline">Login</a>
        </div>
    </form>
    <?php unset($_SESSION['errors']); ?>
</div>
</body>