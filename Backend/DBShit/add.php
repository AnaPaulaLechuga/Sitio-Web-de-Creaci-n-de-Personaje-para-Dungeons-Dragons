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
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO Items (Name, Rarity, `Stat 1`, `Stat 2`, `Stat 3`, `Stat 4`, Weight, Cost, Description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssiiis", $_POST['name'], $_POST['rarity'], $_POST['stat1'], $_POST['stat2'], $_POST['stat3'], $_POST['stat4'], $_POST['weight'], $_POST['cost'], $_POST['description']);

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
