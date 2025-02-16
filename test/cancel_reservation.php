<?php
session_start();

// เชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับข้อมูลจาก POST request
$room_number = $_POST['room_number'];

// เตรียมคำสั่ง SQL
$sql = "UPDATE reservations SET status = 'Cancelled' WHERE room_number = ? AND status = 'Reserved'";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $room_number);

// ส่งคำสั่ง SQL และตรวจสอบผล
if ($stmt->execute()) {
    $response = array("success" => true);
} else {
    $response = array("success" => false, "error" => $conn->error);
}

// ปิดการเชื่อมต่อ
$stmt->close();
$conn->close();

// ส่งผลลัพธ์กลับเป็น JSON
header('Content-Type: application/json');
echo json_encode($response);
?>