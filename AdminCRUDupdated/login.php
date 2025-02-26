<link href="style.css" rel="stylesheet">
<div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md" style="margin-left: auto;margin-right: auto;width: 50%;" ;>
    <h2 class="text-2xl font-bold mb-6 text-center text-green-700">Login</h2>
    <?php include 'logindata.php';?>
    <form method="POST" action="">
        <?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
    // if (isset($_SESSION['email'])) {
    //         header("Location: login.php");
    //         exit();
    //     }
        ?>
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Email" value="<?php echo $_POST[$email] ; ?>">
            <?php if (!empty($emailerr)): ?>
                    <p style='color:red;'><?= $emailerr ?></p>
                <?php endif; ?>

        </div>
        <div class="mb-6">
            <label for="password" class="block text-gray-700">Password</label>
            <input type="password" id="password" name="password" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Password" value="<?php echo $_POST[$password]; ?>">
            <?php if (!empty($passworderr)): ?>
                <p class="text-red-500"><?= $passworderr ?></p>
            <?php endif; ?>
        </div>
        <button type="submit" id="submit" name="submit" class="w-full bg-green-700 text-white p-2 rounded-md hover:bg-green-800">Login</button>
        <div class="text-center mt-4">
            <p class="text-gray-700">Not yet registered?</p>
            <a href="register.php" class="text-blue-500 hover:underline">Register</a>
        </div>
    </form>
</div>