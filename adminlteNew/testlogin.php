<head>
 

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-green-700">Login</h2>
        <form method="POST">
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Email"  required>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Password"  required>
            </div>
            <button type="submit" id="submit" name = "submit" class="w-full bg-green-700 text-white p-2 rounded-md hover:bg-green-800">Login</button>
            <div class="text-center mt-4">
            <p class="text-gray-700">Not yet registered?</p>
            <a href="register.php" class="text-blue-500 hover:underline">Register</a>
            </div>
        </form>
    </div>
    <?php
session_start();

if (isset($_POST['submit'])) {
    $conn = mysqli_connect('localhost', 'root', 'admin123', 'crud_app');
    if (!$conn) {
        die('Could not connect to MySQL: ' . mysqli_connect_error());
    }
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    function checkLogin($conn, $table, $email, $password) {
        $query = "SELECT * FROM $table WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            return $row; 
        }
        return false;
    }

 
    if (checkLogin($conn, 'users', $email, $password)) {
        $_SESSION['email'] = $email;
        if ($email === 'khooshi@gmail.com
' && $password === '123') {

            echo "<script>alert('Login successful! Redirecting to admin page.'); window.location='index.php';</script>";
            exit();
        } else {
            echo "<script>alert('Login successful!'); window.location='index.php';</script>";
            exit();
        }
    }

    // Check credentials in the second table (for doctors)
    
    // Email and password don't match
    echo "<script>alert('Incorrect email or password. Please try again.');</script>";
}
?>



</body>
</html>