<?php
session_start();
$host = "localhost";
$dbname = "ssrumovie";
$username = "root";
$password = "";
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login_username = $_POST['username'];
    $login_password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$login_username' AND password='$login_password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $login_username;  // เก็บชื่อผู้ใช้ใน session
        header("Location: reservation.php"); // เปลี่ยนไปที่หน้าจองห้อง
        exit();
    } else {
        echo "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="">
        <label>Username:</label>
        <input type="text" name="username" required><br><br>
        <label>Password:</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
