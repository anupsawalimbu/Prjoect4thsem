<?php
require_once 'connection.php'; // Include your database connection

// Handle marking appointments
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['mark_appointment'])) {
    // Implement marking appointment logic here
}

// Fetch all users who have appointments
$sql = "SELECT u.id, u.username, u.email, a.appointment_date
        FROM users u
        INNER JOIN appointment a ON u.id = a.user_id";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        form {
            display: inline-block;
        }
    </style>
</head>
<body>

<h2>Appointments</h2>

<table>
    <tr>
        <th>User ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Appointment Date</th>
        <th>Actions</th>
    </tr>
    <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['appointment_date']; ?></td>
                <td>
                    <form method="post">
                        <!-- Add your appointment marking option here -->
                        <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                        <input type="submit" name="mark_appointment" value="Mark Appointment">
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="5">No appointments found.</td>
        </tr>
    <?php endif; ?>
</table>

</body>
</html>
