<?php


// ตรวจสอบว่าผู้ใช้ล็อกอินหรือไม่
if (!isset($_SESSION['username'])) {
    // ถ้ายังไม่ได้ล็อกอิน ให้เปลี่ยนเส้นทางไปหน้าเข้าสู่ระบบ
    header("Location: login.php");
    exit();
}
// เชื่อมต่อฐานข้อมูล
$servername = "localhost"; // เปลี่ยนตามเซิร์ฟเวอร์ของคุณ
$username = "root"; // ชื่อผู้ใช้ฐานข้อมูล
$password = ""; // รหัสผ่านของฐานข้อมูล
$dbname = "ssrumovie"; // ชื่อฐานข้อมูลที่สร้างขึ้น

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);


// ตรวจสอบว่าเป็นผู้ดูแลหรือไม่
if ($_SESSION['role'] != 'admin') {
    // ถ้าไม่ใช่ผู้ดูแล ให้เปลี่ยนเส้นทางไปหน้าอื่น หรือแจ้งเตือนว่าไม่มีสิทธิ์เข้าถึง
    echo "You do not have permission to access this page.";
    exit();
}
// ดึงข้อมูลผู้ใช้จากฐานข้อมูล
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .delete-button {
            color: red;
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid red;
            border-radius: 5px;
        }
        .delete-button:hover {
            background-color: red;
            color: white;
        }
    </style>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a href="admin_index.php">Home</a></li>
            <li><a href="admin_dashboard.php">Dashboard</a></li>
            <li><a href="add_movie.php">Add_movie</a></li>
            <li><a href="admin_round.php">Round</a></li>
        </ul>
    </div>
      
<h2>รายชื่อผู้ใช้</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>ชื่อผู้ใช้</th>
            <th>รหัสนักเรียน</th>
            <th>จัดการ</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // แสดงข้อมูลผู้ใช้ในตาราง
        if ($result->num_rows > 0) {
            while ($user = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$user['id']}</td>";
                echo "<td>{$user['username']}</td>";
                echo "<td>{$user['student_id']}</td>";
                echo "<td>
                    <a href='delete_user.php?id={$user['id']}' class='delete-button' onclick='return confirm(\"คุณแน่ใจหรือว่าต้องการลบผู้ใช้?\");'>ลบ</a>
                </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>ไม่มีข้อมูลผู้ใช้</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>

<?php
// ปิดการเชื่อมต่อ
$conn->close();
?>
