<?php
session_start();


$host = "localhost";
$dbname = "ssrumovie";
$username = "root";
$password = "";
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ตรวจสอบว่าผู้ใช้ต้องการแก้ไขการจองไหน
if (isset($_GET['reservation_id'])) {
    $reservation_id = $_GET['reservation_id'];
    $sql = "SELECT * FROM reservations WHERE id = '$reservation_id' AND username = '" . $_SESSION['username'] . "'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $reservation = $result->fetch_assoc();
    } else {
        echo "Reservation not found or you don't have permission to edit this reservation.";
        exit();
    }
}

// Handle the update process
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $room_number = $_POST['room_number'];
    $movie_name = $_POST['movie_name'];
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];

    $sql = "UPDATE reservations 
            SET room_number = '$room_number', movie_name = '$movie_name', reservation_date = '$reservation_date', reservation_time = '$reservation_time' 
            WHERE id = '$reservation_id' AND username = '" . $_SESSION['username'] . "'";

    if ($conn->query($sql) === TRUE) {
        echo "Reservation updated successfully!";
    } else {
        echo "Error updating reservation: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Reservation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        form input[type="text"],
        form input[type="date"],
        form input[type="time"],
        form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            width: 100%;
        }

        form input[type="submit"]:hover {
            background-color: #45a049;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        .back-link a {
            color: #4CAF50;
            text-decoration: none;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Edit Reservation</h2>
    <form method="POST" action="">
        <label>Room Number:</label>
        <select name="room_number">
            <option value="1" <?php if ($reservation['room_number'] == '1') echo 'selected'; ?>>Room 1</option>
            <option value="2" <?php if ($reservation['room_number'] == '2') echo 'selected'; ?>>Room 2</option>
            <option value="3" <?php if ($reservation['room_number'] == '3') echo 'selected'; ?>>Room 3</option>
            <option value="4" <?php if ($reservation['room_number'] == '4') echo 'selected'; ?>>Room 4</option>
            <option value="5" <?php if ($reservation['room_number'] == '5') echo 'selected'; ?>>Room 5</option>
            <option value="6" <?php if ($reservation['room_number'] == '6') echo 'selected'; ?>>Room 6</option>
        </select><br><br>
        
        <label>Movie Name:</label>
        <input type="text" name="movie_name" value="<?php echo $reservation['movie_name']; ?>" required><br><br>
        
        <label>Reservation Date:</label>
        <input type="date" name="reservation_date" value="<?php echo $reservation['reservation_date']; ?>" required><br><br>
        
        <label>Reservation Time:</label>
        <input type="time" name="reservation_time" value="<?php echo $reservation['reservation_time']; ?>" required><br><br>
        
        <input type="submit" value="Update Reservation">
    </form>

    <div class="back-link">
        <a href="dashboard.php">Go back to Dashboard</a>
    </div>
</div>

</body>
</html>
