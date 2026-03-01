<?php
// Simple page to view subscribers
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'skiller_db';

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Subscribers</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border: 1px solid #ddd; }
        th { background-color: #4CAF50; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .empty { text-align: center; padding: 40px; color: #666; }
    </style>
</head>
<body>
    <h1>Skiller Subscribers</h1>
    
    <?php
    // Query to get all subscribers
    $sql = "SELECT * FROM subscribers ORDER BY subscription_date DESC";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Interest</th>
                <th>Date</th>
                <th>Status</th>
              </tr>";
        
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['interest']) . "</td>";
            echo "<td>" . $row['subscription_date'] . "</td>";
            echo "<td>" . ($row['is_active'] ? 'Active' : 'Inactive') . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        echo "<p>Total subscribers: " . $result->num_rows . "</p>";
    } else {
        echo "<div class='empty'>No subscribers found.</div>";
    }
    
    $conn->close();
    ?>
    
    <p><a href="test_submit.html">Back to Test Form</a></p>
</body>
</html>