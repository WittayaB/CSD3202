<?php
// เชื่อมต่อฐานข้อมูล (สมมติว่ามีตารางชื่อ movies)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ssrumovie";

$conn = new mysqli($servername, $username, $password, $dbname);

// เช็คการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// คำสั่ง SQL สำหรับดึงข้อมูลหนังทั้งหมด
$sql = "SELECT * FROM movies";
$result = $conn->query($sql);

// คำสั่ง SQL เพื่อดึงข้อมูลภาพยนตร์ทั้งหมด
$sql = "SELECT * FROM movies";
$result = $conn->query($sql);

// ตรวจสอบว่ามีข้อมูลหรือไม่
if ($result->num_rows > 0) {
    // เริ่มส่วนของ HTML
    echo '<div class="movie-gallery">';
    while($row = $result->fetch_assoc()) {
        echo '<div class="movie-item">';
        echo '<img src="../admin/uploads/' . $row["poster"] . '" alt="' . $row["title"] . '">';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo "0 results";
}

$conn->close();
?>


<style>
.movie-gallery {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.movie-item {
    width: 200px;
    margin: 10px;
}

.movie-item img {
    width: 100%;
}
</style>