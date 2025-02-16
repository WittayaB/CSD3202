<?php
// เชื่อมต่อฐานข้อมูล
$servername = "localhost"; // เปลี่ยนตามเซิร์ฟเวอร์ของคุณ
$username = "root"; // ชื่อผู้ใช้ฐานข้อมูล
$password = ""; // รหัสผ่านของฐานข้อมูล
$dbname = "ssrumovie"; // ชื่อฐานข้อมูลที่สร้างขึ้น

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// ตรวจสอบว่าได้รับ ID หรือไม่
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // แปลง ID เป็นจำนวนเต็ม

    // สร้างคำสั่ง SQL เพื่อลบผู้ใช้
    $sql = "DELETE FROM users WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "ลบผู้ใช้เรียบร้อยแล้ว";
    } else {
        echo "เกิดข้อผิดพลาดในการลบผู้ใช้: " . $conn->error;
    }
} else {
    echo "ID ของผู้ใช้ไม่ถูกต้อง";
}

// ปิดการเชื่อมต่อ
$conn->close();

// Redirect กลับไปยังหน้า admin dashboard
header("Location: admin_dashboard.php"); // เปลี่ยนเป็นชื่อไฟล์ของแดชบอร์ดผู้ดูแลระบบ
exit;
?>
