<?php
// Database connection parameters
$servername = 'localhost';
$dbName = 'hardware_db';
$username = 'root';
$password = '';

// Establish a connection to the MySQL database
$conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);

// Retrieve the product ID from the query string
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Prepare the SQL statement to fetch the product data
    $sql = "SELECT * FROM products WHERE p_id = :productId";
    $stmt = $conn->prepare($sql);

    // Bind the value to the parameter
    $stmt->bindParam(':productId', $productId);

    // Execute the statement
    if ($stmt->execute()) {
        // Fetch the product data
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($product); // Return the product data as JSON
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}

// Close the database connection
$conn = null;
?>
