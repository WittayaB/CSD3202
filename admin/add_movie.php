<?php
session_start(); // เริ่มต้น session

// ตรวจสอบว่าผู้ใช้ล็อกอินหรือไม่
if (!isset($_SESSION['username'])) {
    // ถ้ายังไม่ได้ล็อกอิน ให้เปลี่ยนเส้นทางไปหน้าเข้าสู่ระบบ
    header("Location: login.php");
    exit();
}

// ตรวจสอบว่าเป็นผู้ดูแลหรือไม่
if ($_SESSION['role'] != 'admin') {
    // ถ้าไม่ใช่ผู้ดูแล ให้เปลี่ยนเส้นทางไปหน้าอื่น หรือแจ้งเตือนว่าไม่มีสิทธิ์เข้าถึง
    echo "You do not have permission to access this page.";
    exit();
}

// โค้ดสำหรับผู้ดูแลสามารถใส่ที่นี่ได้
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลภาพยนตร์</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        h2 {
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label, input, textarea {
            margin-bottom: 10px;
        }

        input, textarea {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
<body>

    <div class="sidebar">
        <ul>
            <li><a href="admin_index.php">Home</a></li>
            <li><a href="admin_dashboard.php">Dashboard</a></li>
            <li><a href="add_movie.php">Add_movie</a></li>
            <li><a href="admin_round.php">Round</a></li>
        </ul>
    </div>

<div class="container" style="margin-top: 150px;margin-left: 200px;" >
    <h2>เพิ่มข้อมูลภาพยนตร์</h2>

    <?php
// ตรวจสอบว่ามีการส่งข้อมูลผ่านฟอร์มหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ตั้งค่าการเชื่อมต่อฐานข้อมูล
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ssrumovie";  // เปลี่ยนเป็นชื่อฐานข้อมูลที่คุณต้องการ

    // รับค่าจากฟอร์ม
    $title = $_POST['title'];
    $release_date = $_POST['release_date'];
    $duration = $_POST['duration'];
    $rating = $_POST['rating'];
    $format = $_POST['format'];
    $imdb_rating = $_POST['imdb_rating'];
    $synopsis = $_POST['synopsis'];

    // ตรวจสอบว่ามีการอัปโหลดไฟล์หรือไม่
    if(isset($_FILES["poster"]) && $_FILES["poster"]["error"] == 0) {
        // ส่วนการอัปโหลดไฟล์รูปภาพ
        $target_dir = "uploads/"; // โฟลเดอร์ที่ต้องการเก็บรูปภาพ
        $target_file = $target_dir . basename($_FILES["poster"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // ตรวจสอบว่าไฟล์ที่อัปโหลดเป็นรูปภาพหรือไม่
        $check = getimagesize($_FILES["poster"]["tmp_name"]);
        if ($check !== false) {
            echo "ไฟล์เป็นรูปภาพ - " . $check["mime"] . ".<br>";
            $uploadOk = 1;
        } else {
            echo "ไฟล์ที่อัปโหลดไม่ใช่รูปภาพ.<br>";
            $uploadOk = 0;
        }

        // ตรวจสอบขนาดของไฟล์ (เช่น ไม่เกิน 5MB)
        if ($_FILES["poster"]["size"] > 5000000) {
            echo "ไฟล์ใหญ่เกินไป.<br>";
            $uploadOk = 0;
        }

        // อนุญาตเฉพาะไฟล์ JPG, JPEG, PNG และ GIF
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
            echo "อนุญาตเฉพาะไฟล์ JPG, JPEG, PNG และ GIF เท่านั้น.<br>";
            $uploadOk = 0;
        }

        // ตรวจสอบว่าไม่มีข้อผิดพลาดและอัปโหลดไฟล์
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["poster"]["tmp_name"], $target_file)) {
                echo "ไฟล์ ". htmlspecialchars(basename($_FILES["poster"]["name"])) . " อัปโหลดเรียบร้อยแล้ว.<br>";

                // สร้างการเชื่อมต่อฐานข้อมูล
                $conn = new mysqli($servername, $username, $password, $dbname);

                // ตรวจสอบการเชื่อมต่อ
                if ($conn->connect_error) {
                    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
                }

                // SQL สำหรับเพิ่มข้อมูลลงในตาราง Movies
                $sql = "INSERT INTO movie (title, poster, release_date, duration, rating, format, imdb_rating, synopsis) 
                        VALUES ('$title', '$target_file', '$release_date', '$duration', '$rating', '$format', '$imdb_rating', '$synopsis')";

                // รันคำสั่ง SQL และตรวจสอบ
                if ($conn->query($sql) === TRUE) {
                    echo "เพิ่มภาพยนตร์สำเร็จ<br><br>";
                } else {
                    echo "เกิดข้อผิดพลาด: " . $conn->error . "<br>";
                }

                // ปิดการเชื่อมต่อ
                $conn->close();

            } else {
                echo "เกิดข้อผิดพลาดในการอัปโหลดไฟล์.<br>";
            }
        }
    } else {
        echo "กรุณาอัปโหลดไฟล์รูปภาพ.<br>";
    }
}
?>


    <!-- ฟอร์มสำหรับกรอกข้อมูลภาพยนตร์ -->
    <form action="add_movie.php" method="POST" enctype="multipart/form-data">
        <label for="title">ชื่อภาพยนตร์:</label>
        <input type="text" id="title" name="title" required>

        <label for="poster">อัปโหลดโปสเตอร์:</label>
        <input type="file" id="poster" name="poster" accept="image/*" required>

        <label for="release_date">วันที่ออกฉาย (YYYY-MM-DD):</label>
        <input type="date" id="release_date" name="release_date" required>

        <label for="duration">ความยาว (นาที):</label>
        <input type="text" id="duration" name="duration" required>

        <label for="rating">เรตติ้ง:</label>
        <input type="text" id="rating" name="rating" required>

        <label for="format">ฟอร์แมต:</label>
        <input type="text" id="format" name="format" required>

        <label for="imdb_rating">IMDB Rating:</label>
        <input type="text" id="imdb_rating" name="imdb_rating" required>

        <label for="synopsis">เรื่องย่อ:</label>
        <textarea id="synopsis" name="synopsis" required></textarea>

        <input type="submit" value="เพิ่มภาพยนตร์">
    </form>
</div>

</body>
</html>
