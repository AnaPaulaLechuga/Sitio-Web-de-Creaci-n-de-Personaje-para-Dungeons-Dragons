<?php
$servername = "sql309.infinityfree.com";
$username = "if0_37569584";
$password = "RwNyndDUUfCCv";
$database = "if0_37569584_items";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle search input if provided
$searchTerm = isset($_POST['search']) ? $_POST['search'] : '';

// Query to fetch items based on search term
$sql = "SELECT id, Name, Rarity, Weight, Cost FROM Items WHERE Name LIKE ?";
$stmt = $conn->prepare($sql);
$searchPattern = '%' . $searchTerm . '%';
$stmt->bind_param("s", $searchPattern);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Item Management</title>
    <style>
        body {
            display: flex;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            width: 30%;
            padding: 20px;
            border-right: 1px solid #ddd;
        }
        .content {
            width: 70%;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .form-container {
            margin-bottom: 20px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

</head>
<body class="content">
<!-- Screenshot Button -->
    <button id="screenshotBtn">Take Screenshot</button>
<div class="sidebar" id="itemDetails">
    <h2>Item Details</h2>
    <!-- Item details will be populated here -->
</div>

<div class="content">
    <h2>Search for an Item</h2>
    <form method="POST" action="">
        <input type="text" name="search" placeholder="Enter item name" value="<?php echo htmlspecialchars($searchTerm); ?>">
        <button type="submit">Search</button>
    </form>

    <h2>Manage Items</h2>
    <div class="form-container">
        <button onclick="document.getElementById('addItemForm').style.display='block'">Add New Item</button>
        <button onclick="document.getElementById('modifyItemForm').style.display='block'">Modify Selected Item</button>
    </div>

    <div id="addItemForm" style="display:none;">
        <h2>Add New Item</h2>
        <form method="POST" action="add.php">
            <input type="text" name="name" placeholder="Item Name" required>
            <input type="text" name="rarity" placeholder="Rarity" required>
            <input type="text" name="stat1" placeholder="Stat 1">
            <input type="text" name="stat2" placeholder="Stat 2">
            <input type="text" name="stat3" placeholder="Stat 3">
            <input type="text" name="stat4" placeholder="Stat 4">
            <input type="number" name="weight" placeholder="Weight" required>
            <input type="text" name="cost" placeholder="Cost" required>
            <textarea name="description" placeholder="Description" required></textarea>
            <button type="submit">Add Item</button>
        </form>
    </div>

    <div id="modifyItemForm" style="display:none;">
        <h2>Modify Item</h2>
        <form method="POST" action="modify.php">
            <input type="hidden" name="id" id="modifyId">
            <input type="text" name="name" id="modifyName" placeholder="Item Name" required>
            <input type="text" name="rarity" id="modifyRarity" placeholder="Rarity" required>
            <input type="text" name="stat1" id="modifyStat1" placeholder="Stat 1">
            <input type="text" name="stat2" id="modifyStat2" placeholder="Stat 2">
            <input type="text" name="stat3" id="modifyStat3" placeholder="Stat 3">
            <input type="text" name="stat4" id="modifyStat4" placeholder="Stat 4">
            <input type="number" name="weight" id="modifyWeight" placeholder="Weight" required>
            <input type="text" name="cost" id="modifyCost" placeholder="Cost" required>
            <textarea name="description" id="modifyDescription" placeholder="Description" required></textarea>
            <button type="submit">Modify Item</button>
        </form>
    </div>

    <h2>Search Results</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Rarity</th>
            <th>Weight</th>
            <th>Cost</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr onclick='fetchItemDetails(" . $row['id'] . ")' style='cursor: pointer;'>";
                echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Rarity']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Weight']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Cost']) . "</td>";
                echo "<td>
                    <form method='POST' action='delete.php' style='display:inline;'>
                        <input type='hidden' name='id' value='" . $row['id'] . "'>
                        <button type='submit'>Delete</button>
                    </form>
                </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No items found</td></tr>";
        }
        ?>
    </table>
</div>

<script>
// JavaScript function to fetch item details with AJAX
function fetchItemDetails(itemId) {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "advanced.php?id=" + itemId, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("itemDetails").innerHTML = xhr.responseText;

            // Populate the modify form with the item details
            const modifyForm = document.getElementById('modifyItemForm');
            document.getElementById('modifyId').value = itemId; // Set ID for modifying
            const itemDetails = JSON.parse(xhr.responseText);
            document.getElementById('modifyName').value = itemDetails.Name;
            document.getElementById('modifyRarity').value = itemDetails.Rarity;
            document.getElementById('modifyStat1').value = itemDetails['Stat 1'];
            document.getElementById('modifyStat2').value = itemDetails['Stat 2'];
            document.getElementById('modifyStat3').value = itemDetails['Stat 3'];
            document.getElementById('modifyStat4').value = itemDetails['Stat 4'];
            document.getElementById('modifyWeight').value = itemDetails.Weight;
            document.getElementById('modifyCost').value = itemDetails.Cost;
            document.getElementById('modifyDescription').value = itemDetails.Description;

            // Show the modify form
            modifyForm.style.display = 'block';
        }
    };
    xhr.send();
}
document.getElementById("screenshotBtn").addEventListener("click", function() {
    html2canvas(document.querySelector(".content")).then(function(canvas) { // Change to specific area if needed
        const link = document.createElement('a');
        link.href = canvas.toDataURL("image/png");
        link.download = 'screenshot.png'; // The name of the download file
        link.click();
    }).catch(function(error) {
        console.error('Error taking screenshot:', error);
    });
});
</script>

</body>
</html>

<?php
// Close the connection
$conn->close();
?>
