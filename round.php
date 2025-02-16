<?php
session_start();

// ตรวจสอบสถานะการเข้าสู่ระบบ
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // เปลี่ยนไปที่หน้าเข้าสู่ระบบ
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ssrumovie";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ฟังก์ชันบันทึกการจองห้อง
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['book_room'])) {
    $room_number = $_POST['room_number'];
    $movie_name = $_POST['movie_name'];
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];
    $username = $_SESSION['username']; // Username ของผู้ใช้ที่ล็อกอิน

    $insert_sql = "INSERT INTO reservations (room_number, movie_name, reservation_date, reservation_time, status, username) 
                   VALUES (?, ?, ?, ?, 'Reserved', ?)";
    $stmt = $conn->prepare($insert_sql);
    $stmt->bind_param("issss", $room_number, $movie_name, $reservation_date, $reservation_time, $username);
    $stmt->execute();

    // เปลี่ยนเส้นทางไปยังหน้าเดียวกันหลังจากบันทึกข้อมูล
    header("Location: " . $_SERVER['PHP_SELF']); // หรือเปลี่ยนเป็นหน้าอื่นที่คุณต้องการ
    exit();
}

// ตรวจสอบว่ามีการส่งคำสั่งลบมาหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_reservation'])) {
    $reservation_id = $_POST['reservation_id'];

    $delete_sql = "DELETE FROM reservations WHERE id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $reservation_id);
    $stmt->execute();

    // เปลี่ยนเส้นทางไปยังหน้าเดียวกันหลังจากลบข้อมูล
    header("Location: " . $_SERVER['PHP_SELF']); // หรือเปลี่ยนเป็นหน้าอื่นที่คุณต้องการ
    exit();
}

// ดึงข้อมูลห้องทั้งหมด
$sql = "SELECT * FROM reservations ORDER BY room_number";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User - Book Room</title>
    <link rel="stylesheet" type="text/css" href="css/round.css">
    <link href="css/s.css" rel="stylesheet">
    <link href="css/Search.css" rel="stylesheet">
   



    <!-- ไอคอนเว็บไซต์ที่แสดงในแท็บเบราว์เซอร์ -->
    <link rel="shortcut icon" type="image/x-icon" href="Photo/preview (2).png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>
<body style="background-color: #333;">

<nav class="navbar sticky-top navbar-expand-sm navbar-light " style="background-color:  #333;">
        <div class="container">
            <a href="index.html" class="navbar-brand">
                <!-- Logo -->
                <img src="img/Logo1.png" height="60" width="65" alt="" style="border-radius: 100%;">

            </a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar1">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- เมนูนำทางหลัก -->
            <div id="navbar1" class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto" style="margin-right: 200px;">
                    <!-- ลิงก์ไปยังหน้าจองหนัง -->
                    <li class="nav-item">
                        <a href="index.php" class="nav-link" style="color: beige; margin-right: 40px ;"><B>HOME</B></a>
                    </li>
                    <!-- เมนูแบบดร็อปดาวน์สำหรับหมวดหมู่หนัง -->
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" style="color: beige; margin-right: 40px;" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <B>Movies </B>
                        </a>

                        <ul class=" dropdown-content" style="margin-left: -40px;background-color: #333;">
                            <a class="dropdown-item" href="movie/Action.php">หนังแอคชั่น Action</a>
                            <a class="dropdown-item" href="movie/adventure.php">ผจญภัย Adventure</a>
                            <a class="dropdown-item" href="movie/horror.php">หนังสยองขวัญ Horror</a>
                            <a class="dropdown-item" href="movie/ASci-fi.php">วิทยาศาสตร์ Sci-fi</a>
                            
                                <hr class="dropdown-divider">
                            
                            <a class="dropdown-item" href="#"></a>
                        </ul>
                    </li>
                    <!-- ลิงก์ไปยังหน้าจองหนัง -->
                    <li class="nav-item">
                        <a href="round.php" class="nav-link"
                            style="color: beige; margin-right: 50px;"><B>Reservation round </B></a>
                    </li>



                    


                </ul>


            </div>
            <div class="dropdown" >
                
                    <!-- Logo -->
                    <img src="img/user(1).png" height="50" width="50" alt=""
                        style="border-radius: 100%;margin-bottom: px; ">

                
                <!-- เนื้อหา dropdown -->
                <div class="dropdown-content" style="margin-right: -50px;">
                    <a href="login.php">Log in</a>
                    <a href="sign.php">Sign up</a>
                    <a href="logout.php">logout</a>
                                </div>
            </div>





        </div>
        </div>
    </nav><br><br>

    <div class="booking-container">
       

        <h1>Book a Room</h1>
        <form method="post">
            <label for="room_number">Room Number:</label>
            <select name="room_number" required>
                <option value="1">Room 1</option>
                <option value="2">Room 2</option>
                <option value="3">Room 3</option>
                <option value="4">Room 4</option>
                <option value="5">Room 5</option>
                <option value="6">Room 6</option>
            </select>

            <label for="movie_name">Movie Name:</label>
            <input type="text" name="movie_name" required>

            <label for="reservation_date">Date:</label>
            <input type="date" name="reservation_date" required>

            <label for="reservation_time">Time:</label>
            <input type="time" name="reservation_time" required>

            <input type="submit" name="book_room" value="Book Room">
        </form>

        <br>
        <h1>Available Rooms</h1>
        <table>
            <tr>
                <th>Room Number</th>
                <th>Date</th>
                <th>Time</th>
                <th>Current Status</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['room_number']; ?></td>
                <td><?php echo $row['reservation_date']; ?></td>
                <td><?php echo $row['reservation_time']; ?></td>
                <td><?php echo $row['status']; ?></td>
                
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>

<?php
// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>
