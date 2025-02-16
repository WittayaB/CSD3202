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

// Fetch user's reservations
$sql = "SELECT * FROM reservations WHERE username = '" . $_SESSION['username'] . "'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
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

        .dashboard-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 600px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .action-buttons a {
            margin-right: 10px;
            color: #4CAF50;
            text-decoration: none;
        }

        .action-buttons a:hover {
            text-decoration: underline;
        }

        .logout {
            text-align: center;
            margin-top: 20px;
        }

        .logout a {
            color: #333;
            text-decoration: none;
        }

        .logout a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="dashboard-container">
    <h2>Welcome, <?php echo $_SESSION['username']; ?>'s Dashboard</h2>

    <h3>Your Reservations</h3>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <tr>
                <th>Room Number</th>
                <th>Movie Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['room_number']; ?></td>
                    <td><?php echo $row['movie_name']; ?></td>
                    <td><?php echo $row['reservation_date']; ?></td>
                    <td><?php echo $row['reservation_time']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td class="action-buttons">
                        <a href="edit_reservation.php?reservation_id=<?php echo $row['id']; ?>">Edit</a>
                        <a href="delete_reservation.php?reservation_id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this reservation?');">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>You have no reservations.</p>
    <?php endif; ?>

    <div class="logout">
        <a href="logout.php">Logout</a>
    </div>
</div>

</body>
</html>
