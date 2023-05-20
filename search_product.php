
<?php
// Database connection parameters
$servername = 'localhost';
$dbName = 'hardware_db';
$username = 'root';
$password = '';

// Establish a connection to the MySQL database
$conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);


// Check if a search query is submitted
if (isset($_GET['search'])) {
  // Sanitize the search query to prevent SQL injection
  $search = mysqli_real_escape_string($conn, $_GET['search']);

  // Construct the SQL query
  $query = "SELECT * FROM products WHERE p_name LIKE '%$search%'";

  // Execute the query
  $result = mysqli_query($conn, $query);

  // Fetch the data as an associative array
  $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>