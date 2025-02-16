<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'ssrumovie');

if ($conn->connect_error) {
    die('Connection Failed : '.$conn->connect_error);
}

// Handling the signup form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypting the password
    $student_id = $_POST['student_id'];
    
    // SQL query to insert data
    $sql = "INSERT INTO users (username, password, student_id) VALUES ('$username', '$password', '$student_id')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link href="css/login.css" rel="stylesheet">

    <link rel="shortcut icon" type="image/x-icon" href="Photo/preview (2).png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="form"
    style="margin-left: 500px;margin-top: 150px; background-image: url(img/wallpaperflare.com_wallpaper\(20\).jpg);">

    <form action="signup.php" method="POST">
        <p id="heading">Sign up</p>
        <div class="field">
            <input autocomplete="off" name="username" placeholder="username" class="input-field" type="text" required>
        </div><br>

        <div class="field">
            <input name="password" placeholder="password" class="input-field" type="password" required>
        </div><br>

        <div class="field">
            <input name="student_id" placeholder="student_id" class="input-field" type="text" required>
        </div>

        <div class="btn">
            <button type="submit" class="button2">Sign Up</button>
        </div>

        <a href="index.php" style="margin-left: 145px;">
            <button type="button" class="button1">Home</button>
        </a>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>