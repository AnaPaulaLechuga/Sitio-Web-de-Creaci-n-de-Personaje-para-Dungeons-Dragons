<?php
$servername = "sql309.infinityfree.com";
$username = "if0_37569584";
$password = "RwNyndDUUfCCv";
$database = "if0_37569584_items";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM Items WHERE id=?");
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect back to the main page
        header("Location: table.php"); // replace with the actual path of your main page
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}

$stmt->close();
$conn->close();
?>
