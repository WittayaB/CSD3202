<?php
// เชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ssrumovie";

$conn = new mysqli($servername, $username, $password, $dbname);

// เช็คการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับค่าที่ส่งมาจากลิงก์ (id ของหนัง)
$movie_id = isset($_GET['id']) ? $_GET['id'] : '';

?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายละเอียดภาพยนตร์</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto; /* เพิ่มระยะห่างด้านบน */
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px; /* ทำมุมมน */
        }
        .movie-details img {
            max-width: 100%; /* ทำให้ภาพมีขนาดสูงสุด 100% ของคอนเทนเนอร์ */
            height: auto; /* ทำให้ความสูงปรับตามอัตราส่วน */
            border-radius: 8px; /* ทำมุมมน */
            margin-bottom: 20px; /* เพิ่มระยะห่างด้านล่าง */
            max-height: 400px; /* กำหนดความสูงสูงสุด */
        }
        h1 {
            text-align: center;
            font-size: 28px; /* ปรับขนาดตัวอักษร */
            margin: 20px 0;
            color: #333; /* เปลี่ยนสีตัวอักษร */
        }
        .movie-info {
            text-align: center;
            font-size: 18px;
            color: #555; /* เปลี่ยนสีตัวอักษร */
        }
        .movie-info p {
            margin: 10px 0;
            padding: 10px; /* เพิ่มระยะห่างภายใน */
            background-color: #e9e9e9; /* เพิ่มพื้นหลัง */
            border-radius: 5px; /* ทำมุมมน */
            transition: background-color 0.3s; /* เพิ่มการเปลี่ยนสีพื้นหลัง */
        }
        .movie-info p:hover {
            background-color: #d0d0d0; /* เปลี่ยนสีพื้นหลังเมื่อ hover */
        }
        .error-message {
            text-align: center;
            color: red; /* เปลี่ยนสีข้อความผิดพลาด */
            font-weight: bold;
            margin-top: 20px; /* เพิ่มระยะห่างด้านบน */
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // ตรวจสอบว่ามี ID หนังหรือไม่
        if (!empty($movie_id)) {
            // คำสั่ง SQL เพื่อดึงข้อมูลของหนังตาม ID
            $sql = "SELECT * FROM movies WHERE id = $movie_id";
            $result = $conn->query($sql);

            // ตรวจสอบว่ามีข้อมูลหนังที่ตรงกันหรือไม่
            if ($result->num_rows > 0) {
                // แสดงผลรายละเอียดของหนัง
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="movie-details">';
                    echo '<img src="admin/uploads/' . $row['poster'] . '" alt="' . htmlspecialchars($row['title']) . '">';
                    echo '</div>';
                    echo '<h1>' . htmlspecialchars($row['title']) . '</h1>';
                    echo '<div class="movie-info">';
                    echo '<p>ปีที่ออกฉาย: ' . htmlspecialchars($row['release_date']) . '</p>';
                    echo '<p>IMDb Rating: ' . htmlspecialchars($row['imdb_rating']) . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<div class="error-message">ไม่พบข้อมูลหนังที่คุณต้องการ</div>';
            }
        } else {
            echo '<div class="error-message">ไม่พบข้อมูลหนังที่คุณต้องการ</div>';
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
