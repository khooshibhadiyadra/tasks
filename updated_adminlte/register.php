<link href="style.css" rel="stylesheet">
<div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md" style="margin-left: auto;margin-right: auto;width: 50%;">
    <h2 class="text-2xl font-bold mb-6 text-center text-green-700">Register</h2>
    <?php include 'registerdata.php';?>

    <form method="POST" action="">

        <div class="mb-4">
            <label for="first_name" class="block text-gray-700">First Name</label>
            <input type="text" id="first_name" name="first_name" class="w-full p-2 border border-gray-300 rounded-md" placeholder="First Name" value="<?php echo $_POST['first_name'] ; ?>">
            <?php if (!empty($firstnamerr)): ?>
                <p class="text-red-500"><?= $firstnamerr ?></p>
            <?php endif; ?>
        </div>

        <div class="mb-4">
            <label for="last_name" class="block text-gray-700">Last Name</label>
            <input type="text" id="last_name" name="last_name" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Last Name" value="<?php echo $_POST['last_name'];?>">
            <?php if (!empty($lastnameerr)): ?>
                <p class="text-red-500"><?= $lastnameerr ?></p>
            <?php endif; ?>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Email" value="<?php echo $_POST['email'];?>">
            <?php if (!empty($emailerr)): ?>
                <p class="text-red-500"><?= $emailerr ?></p>
            <?php endif; ?>
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700">Password</label>
            <input type="password" id="password" name="password" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Password" value="<?php echo $_POST['password'];?>">
            <?php if (!empty($passworderr)): ?>
                <p class="text-red-500"><?= $passworderr ?></p>
            <?php endif; ?>
        </div>

        <button type="submit" id="submit" name="submit" class="w-full bg-green-700 text-white p-2 rounded-md hover:bg-green-800">Register</button>
        <div class="text-center mt-4">
            <p class="text-gray-700">Already registered?</p>
            <a href="login.php" class="text-blue-500 hover:underline">Login</a>
        </div>
    </form>

</div>
</body>