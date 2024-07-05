<?php
include 'connection.php';
include 'navbar.php';

// Check if delete_id is set and process deletion
if (isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $delete_sql = "DELETE FROM appointments WHERE id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $delete_id);
    if ($stmt->execute()) {
        echo "<script>alert('Record deleted successfully');</script>";
        // Optionally, you can redirect or refresh the page after deletion
        // header("Refresh:0"); // Uncomment to refresh the page after deletion
    } else {
        echo "<script>alert('Error deleting record: " . $conn->error . "');</script>";
    }
    $stmt->close();
}

// Retrieve appointments from database
$sql = "SELECT * FROM appointments";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #007bff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 20px;
            color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar .logo {
            font-size: 24px;
            font-weight: bold;
            color: #ecf0f1;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        .navbar ul {
            list-style-type: none;
            display: flex;
            gap: 20px;
            margin: 0;
            padding: 0;
        }

        .navbar ul li {
            display: inline;
        }

        .navbar ul li a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            transition: background-color 0.3s ease, color 0.3s ease;
            border-radius: 5px;
        }

        .navbar ul li a:hover {
            background-color: #34495e;
            color: #1abc9c;
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
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .delete-button {
            color: white;
            background-color: #dc3545;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .delete-button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>


<?php
if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Appointment Date and Time</th>
                <th>Name</th>
                <th>Contact Number</th>
                <th>Action</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["appointment_datetime"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["contact_number"] . "</td>
                <td>
                    <form method='POST' style='display:inline;'>
                        <input type='hidden' name='delete_id' value='" . $row["id"] . "'>
                        <button type='submit' class='delete-button'>Delete</button>
                    </form>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>
