
<html>
<head>
    <title>PHP Form Validation Example</title>
    <style>
        h6.title {
            color: red;
        }
        #requiredfield {
            color: red;
        }
        #comment {
            height: 109px;
        }
    </style>
</head>
<body>
    <form method="POST" action="">
        <h1>PHP Form Validation Example</h1>
        <h6 class="title">*required field</h6>
        
        Name: <input type="text" name="name" id="name"> *<br>
        E-mail: <input type="email" name="email" id="email"> *<br>
        Website: <input type="text" name="web" id="web"><br><br>
        Comment: <textarea name="comment" id="comment"></textarea><br>
        Gender:
        <input type="radio" name="gender" id="f" value="Female"> Female
        <input type="radio" name="gender" id="m" value="Male"> Male
        <input type="radio" name="gender" id="o" value="Other"> Other
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <h2>Your Input:</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $name = !empty($_POST["name"]) ? htmlspecialchars($_POST["name"]) : "Not provided";
        $email = !empty($_POST["email"]) ? htmlspecialchars($_POST["email"]) : "Not provided";
        $web = !empty($_POST["web"]) ? htmlspecialchars($_POST["web"]) : "Not provided";
        $comment = !empty($_POST["comment"]) ? htmlspecialchars($_POST["comment"]) : "Not provided";
        $gender = !empty($_POST["gender"]) ? htmlspecialchars($_POST["gender"]) : "Not provided";

        echo "<p>Name: $name</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Website: $web</p>";
        echo "<p>Comment: $comment</p>";
        echo "<p>Gender: $gender</p>";
    }
    ?>
</body>
</html>