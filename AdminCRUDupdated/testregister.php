<head>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-green-700">Register</h2>
        <form method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="mb-4">
                <label for="first_name" class="block text-gray-700">FirstName</label>
                <input type="text" id="first_name" name="first_name" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Username"  required>
            </div>
            <div class="mb-4">
                <label for="last_name" class="block text-gray-700">LastName</label>
                <input type="text" id="last_name" name="last_name" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Username"  required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Email" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Password" required>
            </div>
            <button type="submit" id="submit" name = "submit" class="w-full bg-green-700 text-white p-2 rounded-md hover:bg-green-800">Register</button>
            <div class="text-center mt-4">
            <p class="text-gray-700">Already registered?</p>
            <a href="testlogin.php" class="text-blue-500 hover:underline">Login</a>
            </div>
          
        </form>
    </div>
    <?php 
    if(isset($_POST['submit'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $conn = mysqli_connect('localhost', 'root', 'admin123', 'crud_app');
        // Check if connection was successful
        if (!$conn) {
            die('Could not connect to MySQL: ' . mysqli_connect_error());
        }

        $insert = "INSERT INTO users (first_name,last_name,email,password) VALUES ('$first_name','$last_name','$email','$password')";
        $result = mysqli_query($conn, $insert);

        if ($result) {
            //  echo '<script>alert("You have registered successfully");</script>';
           echo "<script>alert('You have successfully registered!'); window.location='testlogin.php';</script>";
            exit();
        } else {
            echo "Error: ". mysqli_error($conn);
        }
        // Close connection
        mysqli_close($conn);
    }
?>
</body>
</html>