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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Header -->
    

    <!-- Sidebar Menu -->
    <div class="sidebar">
        <ul>
            <li><a href="admin_dashboard.php">Dashboard</a></li>
            <li><a href="add_movie.php">Add_movie</a></li>
            <li><a href="admin_round.php">Round</a></li>
        </ul>
    </div>
    <div class="header">
        <div class="logo" class="header">
            <h1>SSRU Movie Admin</h1>
        </div>
        <div class="user-info" style="margin-left: 20px;">
            <a href="../index.php" class="logout-btn">Logout</a>
        </div>
    </div>
    <!-- Main Content -->
    <div class="main-content">
        <h2>Dashboard Overview</h2>
        <div class="dashboard-grid">
            <div class="card">
                <h3>Total Reservations</h3>
                <p>123</p>
            </div>
            <div class="card">
                <h3>Rooms Available</h3>
                <p>4</p>
            </div>
            <div class="card">
                <h3>Rooms Under Maintenance</h3>
                <p>2</p>
            </div>
            <div class="card">
                <h3>Recent Activity</h3>
                <ul>
                    <li>Room 1 booked by User A</li>
                    <li>Room 3 canceled by User B</li>
                </ul>
            </div>
        </div>
    </div>

    
    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 SSRU Movie Booking System</p>
    </footer>
</body>
</html>
