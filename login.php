<?php 
session_start(); // เริ่ม session

// เชื่อมต่อกับฐานข้อมูล
$conn = new mysqli("localhost", "root", "", "ssrumovie");

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ตรวจสอบว่ามีผู้ใช้อยู่ในฐานข้อมูลหรือไม่
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // รับข้อมูลผู้ใช้
        $row = $result->fetch_assoc();
        // ตรวจสอบรหัสผ่าน
        if (password_verify($password, $row['password'])) {
            // ตั้งค่า session
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $row['role']; // เก็บ role ของผู้ใช้ใน session

            // ตรวจสอบ role ของผู้ใช้
            if (strcasecmp($row['role'], 'Admin') == 0) {
                // หากเป็น admin ให้ไปยังหน้า admin
                header("Location: admin/admin_index.php");
            } else {
                // หากไม่ใช่ admin ให้ไปยังหน้าทั่วไป
                header("Location: round.php");
            }
            exit();
        } else {
            header("Location: index.php");
        }
    } else {
        header("Location: index.php");
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="css/login.css" rel="stylesheet">


      <!-- ไอคอนเว็บไซต์ที่แสดงในแท็บเบราว์เซอร์ -->
      <link rel="shortcut icon" type="image/x-icon" href="Photo/preview (2).png" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 
  
    

</head>

<body class="form" style="margin-left: 500px;margin-top: 150px; background-image: url(img/wallpaperflare.com_wallpaper\(20\).jpg);" >

  
    

    <form action="login.php" method="POST">

        <p id="heading">Login</p>
        <div class="field">
            <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                viewBox="0 0 16 16">
                <path
                    d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z">
                </path>
            </svg>
            <input autocomplete="off" name="username" placeholder="Username" class="input-field" type="text">
        </div><br>

        <div class="field">
            <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                viewBox="0 0 16 16">
                <path
                    d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z">
                </path>
            </svg>
            <input name="password" placeholder="Password" class="input-field" type="password">
        </div>
        
       
        
        <div class="btn" style="margin-top: -30px;" >
           
            <div class="btn">
                <button type="submit" class="button2" style="margin-bottom: 0px;">Login</button>
            </div>
            
        </div>
        <a href="index.php" style="margin-left: 145px;margin-bottom: 100px;">
            <button type="button" class="button1">Home</button>
        </a>
       
    </form>

       
    

    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>


</body>

</html>