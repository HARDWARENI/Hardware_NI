<?php
session_start();

// Destroy all session data
session_destroy();

// Prevent caching of the current page
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// Redirect the user to the login page
header("Location: login.php");
exit();
?>
