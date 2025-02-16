<?php
// Database connection
$host = "localhost";
$dbname = "user_db"; // เปลี่ยนชื่อฐานข้อมูลให้ตรงกับของคุณ
$username = "root"; // เปลี่ยนชื่อผู้ใช้ MySQL
$password = ""; // ใส่รหัสผ่าน MySQL

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle status update
if (isset($_POST['update_status'])) {
    $reservation_id = $_POST['reservation_id'];
    $new_status = $_POST['status'];

    $sql = "UPDATE reservations SET status='$new_status' WHERE id='$reservation_id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Status updated successfully!";
    } else {
        echo "Error updating status: " . $conn->error;
    }
}

// Fetch all reservations for admin
$sql = "SELECT id, room_number, movie_name, reservation_date, reservation_time, status, username FROM reservations";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Manage Reservations</title>
</head>
<body>
    <h2>Manage Room Reservations</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Room Number</th>
            <th>Movie Name</th>
            <th>Reservation Date</th>
            <th>Reservation Time</th>
            <th>Status</th>
            <th>Username</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["room_number"] . "</td>
                        <td>" . $row["movie_name"] . "</td>
                        <td>" . $row["reservation_date"] . "</td>
                        <td>" . $row["reservation_time"] . "</td>
                        <td>" . $row["status"] . "</td>
                        <td>" . $row["username"] . "</td>
                        <td>
                            <form method='POST' action=''>
                                <input type='hidden' name='reservation_id' value='" . $row["id"] . "'>
                                <select name='status'>
                                    <option value='Pending' " . ($row["status"] == 'Pending' ? 'selected' : '') . ">Pending</option>
                                    <option value='Confirmed' " . ($row["status"] == 'Confirmed' ? 'selected' : '') . ">Confirmed</option>
                                    <option value='Cancelled' " . ($row["status"] == 'Cancelled' ? 'selected' : '') . ">Cancelled</option>
                                </select>
                                <input type='submit' name='update_status' value='Update'>
                            </form>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No reservations found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
