<?php
// Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'travel');

// Application URL Configuration
define('APP_URL', 'http://localhost/listedtravel');

// Database Connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Connection failed: " . mysqli_connect_error());

// Set charset to ensure proper encoding
mysqli_set_charset($conn, "utf8");
?>