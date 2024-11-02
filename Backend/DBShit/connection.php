<?php
$servername = "sql309.infinityfree.com";  // Change if your database is hosted remotely
$username = "if0_37569584";
$password = "RwNyndDUUfCCv";
$database = "if0_37569584_items";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

// Close the connection
$conn->close();
?>