<?php
// Database connection credentials
$servername = "sql203.infinityfree.com"; // Your MySQL hostname
$username = "if0_36784770"; // Your database username
$password = "bawakontonkyi"; // Your database password
$dbname = "if0_36784770_dbname"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>