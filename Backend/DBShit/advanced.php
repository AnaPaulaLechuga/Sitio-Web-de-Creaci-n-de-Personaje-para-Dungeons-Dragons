<?php
$servername = "sql309.infinityfree.com";
$username = "if0_37569584";
$password = "RwNyndDUUfCCv";
$database = "if0_37569584_items";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get item ID from the request
$itemId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Query to fetch the item details
$sql = "SELECT Name, Rarity, `Stat 1`, `Stat 2`, `Stat 3`, `Stat 4`, Weight, Cost, Description FROM Items WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $itemId);
$stmt->execute();
$result = $stmt->get_result();

// Display item details if found
if ($row = $result->fetch_assoc()) {
    echo "<h2>" . htmlspecialchars($row['Name']) . "</h2>";
    echo "<p><strong>Rarity:</strong> " . htmlspecialchars($row['Rarity']) . "</p>";
    for ($i = 1; $i <= 4; $i++) {
        $stat = 'Stat ' . $i;
        if (!empty($row[$stat])) {
            echo "<p><strong>$stat:</strong> " . htmlspecialchars($row[$stat]) . "</p>";
        }
    }
    echo "<p><strong>Weight:</strong> " . htmlspecialchars($row['Weight']) . "</p>";
    echo "<p><strong>Cost:</strong> " . htmlspecialchars($row['Cost']) . "</p>";
    echo "<p><strong>Description:</strong> " . htmlspecialchars($row['Description']) . "</p>";
} else {
    echo "<p>No details found for this item.</p>";
}

$conn->close();
?>
