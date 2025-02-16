<?php
$search_value = isset($_GET['search']) ? $_GET['search'] : '';

if (!empty($search_value)) {
    // สร้างการเชื่อมต่อฐานข้อมูล
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ssrumovie";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // เช็คการเชื่อมต่อ
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // ตรวจสอบว่าเป็น ID หรือชื่อหนัง
    $sql = "SELECT * FROM movies WHERE 1=1"; // 1=1 ใช้เป็นเงื่อนไขเริ่มต้น

    if (is_numeric($search_value)) {
        $sql .= " AND id = ?"; // ถ้าเป็นตัวเลข ให้ค้นหาจาก ID
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $search_value);
    } else {
        $sql .= " AND title LIKE ?"; // ถ้าไม่ใช่ตัวเลข ให้ค้นหาจากชื่อ
        $stmt = $conn->prepare($sql);
        $like_name = "%" . $search_value . "%";
        $stmt->bind_param("s", $like_name);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    // แสดงผลลัพธ์
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id'] . " - ชื่อหนัง: " . $row['title'] . "<br>";
    }

    $stmt->close();
    $conn->close();
}
?>

<form action="movie.php" method="get">
    <label for="search">ค้นหาภาพยนตร์โดย ID หรือชื่อ:</label>
    <input type="text" id="search" name="search" placeholder="กรุณากรอก ID หรือชื่อภาพยนตร์">
    
    <button type="submit">ค้นหา</button>
</form>
