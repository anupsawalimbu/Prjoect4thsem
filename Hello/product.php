<?php
require_once 'connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM product WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
    $id = $_POST['id'];
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $sql = "UPDATE product SET product_name = ?, description = ? WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssi", $product_name, $product_description, $id);
        $stmt->execute();
        $stmt->close();
    }
}

 
$sql = "SELECT id, product_name, image, description FROM product";
$result = $conn->query($sql);

$conn->close();
?>
<?php
include 'adminnav.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 0;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container1 {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 80%;
            margin: auto 8%;
            justify-content: center;


        }


        form {
            display: flex;
            flex-direction: column;
            align-items: left;

        }

        label {
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="file"],
        textarea,
        input[type="submit"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }


        .container:hover {
            transform: translateY(-5px);
            transition: transform 0.3s ease;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        .edit-btn,
        .delete-btn {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .edit-btn {
            background-color: #007bff;
            color: #fff;
        }

        .edit-btn:hover {
            background-color: #0056b3;
        }

        .delete-btn {
            background-color: #ff4c4c;
            color: #fff;
        }

        .delete-btn:hover {
            background-color: #cc0000;
        }

        .form-container {
            margin-top: 20px;
        }

        .form-container input[type="text"],
        .form-container textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container1">
        <h2>Upload Product</h2>
        <form method="post" action="upload_process.php" enctype="multipart/form-data">
            <label for="product_name">Product Name</label>
            <input type="text" id="product_name" name="product_name" required>

            <label for="product_image">Product Image</label>
            <input type="file" id="product_image" name="product_image" accept="image/*" required>

            <label for="product_description">Product Description</label>
            <textarea id="product_description" name="product_description" required></textarea>


            <input type="submit" value="Upload Product">
        </form>
    </div>

    <div class="container">
        <h2>Product List</h2>
        <table>
            <tr>
                <th>Product Name</th>
                <th>Image</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                        <td><img src="product/<?php echo htmlspecialchars($row['image']); ?>"
                                alt="<?php echo htmlspecialchars($row['product_name']); ?>" width="100" height="100"></td>
                        <td><?php echo htmlspecialchars($row['description']); ?></td>
                        <td>
                            <form method="post" style="display:inline-block;">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <input type="hidden" name="product_name"
                                    value="<?php echo htmlspecialchars($row['product_name']); ?>">
                                <input type="hidden" name="product_description"
                                    value="<?php echo htmlspecialchars($row['description']); ?>">
                                <input type="submit" name="edit" class="edit-btn" value="Edit">
                            </form>
                            <form method="post" style="display:inline-block;">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <input type="submit" name="delete" class="delete-btn" value="Delete">
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No products found.</td>
                </tr>
            <?php endif; ?>
        </table>

        <!-- Edit Form -->
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])): ?>
            <div class="form-container">
                <h2>Edit Product</h2>
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
                    <label for="product_name">Product Name</label>
                    <input type="text" id="product_name" name="product_name"
                        value="<?php echo htmlspecialchars($_POST['product_name']); ?>" required>
                    <label for="product_description">Product Description</label>
                    <textarea id="product_description" name="product_description"
                        required><?php echo htmlspecialchars($_POST['product_description']); ?></textarea>
                    <input type="submit" name="edit" value="Update Product">
                </form>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>