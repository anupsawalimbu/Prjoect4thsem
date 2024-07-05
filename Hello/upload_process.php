<?php
 
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
    if (isset($_FILES["product_image"]) && $_FILES["product_image"]["error"] == 0) {
        
        $target_dir = "product/";
 
        $file_name = basename($_FILES["product_image"]["name"]);

      
        $target_path = $target_dir . $file_name;
 
        if (file_exists($target_path)) {
            echo "Sorry, the file already exists.";
        } else {
            
            if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_path)) {
                 
                
                $product_name = $_POST["product_name"];
                $product_description = $_POST["product_description"];

                
                $stmt = $conn->prepare("INSERT INTO product (product_name, image, description) VALUES (?, ?, ?)");
                if ($stmt) {
                    $stmt->bind_param("sss", $product_name, $file_name, $product_description);
                    
                 
                    if ($stmt->execute()) {
                        echo "Product uploaded successfully.";
                    } else {
                        echo "Error executing query: " . $stmt->error;
                    }

                  
                    $stmt->close();
                } else {
                    echo "Error preparing statement: " . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "Error: " . $_FILES["product_image"]["error"];
    }
}
?>
