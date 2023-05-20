<?php

// Database connection code
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hardware_db";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$category = isset($_POST['category']) ? $_POST['category'] : '';
$p_id = isset($_POST['p_id']) ? $_POST['p_id'] : '';
$p_name = isset($_POST['p_name']) ? $_POST['p_name'] : '';
$p_price = isset($_POST['p_price']) ? $_POST['p_price'] : '';
$p_desc = isset($_POST['p_desc']) ? $_POST['p_desc'] : '';

// Handle uploaded image file
$p_image = isset($_FILES['p_image']['name']) ? $_FILES['p_image']['name'] : '';
$p_image_tmp = isset($_FILES['p_image']['tmp_name']) ? $_FILES['p_image']['tmp_name'] : '';

if (!empty($p_image_tmp)) {
    move_uploaded_file($p_image_tmp, "images/$p_image");
}

// Check if product ID is provided
if (!empty($p_id)) {
    // Edit existing product
  
    // Implement your specific database update code here
    $updateQuery = "UPDATE products SET p_image='$p_image', category='$category', p_name='$p_name', p_price='$p_price', p_desc='$p_desc' WHERE p_id='$p_id'";
    $updateResult = mysqli_query($conn, $updateQuery);
  
    if ($updateResult) {
        // Retrieve the updated product from the database
        $updatedProductQuery = "SELECT * FROM products WHERE p_id = '$p_id'";
        $updatedProductResult = mysqli_query($conn, $updatedProductQuery);
        
        if ($updatedProductResult && mysqli_num_rows($updatedProductResult) > 0) {
            $updatedProduct = mysqli_fetch_assoc($updatedProductResult);
        } else {
            echo "Failed to retrieve the updated product.";
        }
    } else {
        echo "Failed to update the product.";
    }
} else {
    // Add new product
  
    // Implement your specific database insertion code here
    $insertQuery = "INSERT INTO products (p_image, category, p_id, p_name, p_price, p_desc) VALUES ('$p_image', '$category', '$p_id', '$p_name', '$p_price', '$p_desc')";
    $insertResult = mysqli_query($conn, $insertQuery);
  
    if ($insertResult) {
        // Retrieve the inserted product from the database
        $insertedProductQuery = "SELECT * FROM products WHERE p_id = LAST_INSERT_ID()";
        $insertedProductResult = mysqli_query($conn, $insertedProductQuery);
        
        if ($insertedProductResult && mysqli_num_rows($insertedProductResult) > 0) {
            $insertedProduct = mysqli_fetch_assoc($insertedProductResult);
        } else {
            echo "Failed to retrieve the inserted product.";
        }
    } else {
        echo "Failed to insert the product.";
    }
}

// Close the database connection
mysqli_close($conn)

?>


<!DOCTYPE html>
<html>
<head>
  <title>Product Details</title>
</head>
<body>
    <td class="px-5" style="width: 100px;">
        <img src="images/<?php echo $insertedProduct['p_image']; ?>" alt="Product Image">
    </td>
    <td class="px-5" style="width: 150px; text-align:center"><?php echo $insertedProduct['category']; ?> </td>
    <td class="px-5" style="width: 150px; text-align:center"><?php echo $insertedProduct['p_id']; ?> </td>
    <td class="px-5" style="width: 350px; text-align:center"><?php echo $insertedProduct['p_name']; ?></td>
    <td class="px-5" style="width: 200px; text-align:center"><?php echo "₱ " .$insertedProduct['p_price']; ?> </td>
    <td class="px-5" style="width:600px; text-align: justify;"><?php echo $insertedProduct['p_desc']; ?></td>
    <td class="px-5" style="text-align:center">
    <a href="edit_product.php?p_id=<?php echo $insertedProduct['p_id']; ?>">
        <span id="editModalBtn">
            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" top="10" fill="black" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
            </svg>
        </span>						 
    </a>
    <a href="delete_product.php?p_id=<?php echo $insertedProduct['p_id']; ?>">
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="black" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
            </svg>
        </span>
    </a>
    </td>
</body>
</html>