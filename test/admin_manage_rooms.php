<?php
session_start();
// ตรวจสอบสิทธิ์แอดมิน
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ssrumovie";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// เชื่อมต่อฐานข้อมูล

// ดึงข้อมูลห้องทั้งหมด
$sql = "SELECT * FROM reservations ORDER BY room_number";
$result = $conn->query($sql);

// ฟังก์ชันอัปเดตสถานะ
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_status'])) {
    $room_id = $_POST['room_id'];
    $new_status = $_POST['new_status'];
    
    $update_sql = "UPDATE reservations SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("si", $new_status, $room_id);
    $stmt->execute();
    
    // รีโหลดหน้าเพื่อแสดงข้อมูลที่อัปเดต
    header("Location: admin_manage_rooms.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Manage Rooms</title>
</head>
<body>
    <h1>Manage Room Statuses</h1>
    <table border="1">
        <tr>
            <th>Room Number</th>
            <th>Movie Name</th>
            <th>Date</th>
            <th>Time</th>
            <th>Current Status</th>
            <th>Action</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['room_number']; ?></td>
            <td><?php echo $row['movie_name']; ?></td>
            <td><?php echo $row['reservation_date']; ?></td>
            <td><?php echo $row['reservation_time']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td>
                <form method="post">
                    <input type="hidden" name="room_id" value="<?php echo $row['id']; ?>">
                    <select name="new_status">
                        <option value="Available">Available</option>
                        <option value="Reserved">Reserved</option>
                        <option value="Maintenance">Maintenance</option>
                    </select>
                    <input type="submit" name="update_status" value="Update">
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>