<?php
  // Connect to MySQL database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "users";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check if connection was successful
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Get the username and password from the form
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Insert the username and password into the database
  $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

  if (mysqli_query($conn, $sql)) {
    echo "Registration successful!";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
  <title>Registration Form</title>
</head>
<body>
  <h1>Registration Form</h1>
  <form method="POST" action="register.php">
    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>
    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>
    <input type="submit" value="Register">
  </form>
</body>
</html>
