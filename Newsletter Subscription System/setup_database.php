<?php
// Database setup for XAMPP
echo "<h2>Setting up Skiller Database</h2>";

// Default XAMPP credentials
$host = 'localhost';
$username = 'root';
$password = '';  // XAMPP default is empty
$database = 'skiller_db';

// Create connection
$conn = new mysqli($host, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected to MySQL server successfully.<br>";

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sql) === TRUE) {
    echo "Database '$database' created or already exists.<br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

// Select the database
$conn->select_db($database);

// Create subscribers table
$sql = "CREATE TABLE IF NOT EXISTS subscribers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    interest VARCHAR(50) NOT NULL,
    subscription_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_active BOOLEAN DEFAULT TRUE,
    ip_address VARCHAR(45),
    user_agent TEXT
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'subscribers' created or already exists.<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Test insert
$test_sql = "INSERT INTO subscribers (name, email, interest) 
             VALUES ('Test User', 'test@example.com', 'web')
             ON DUPLICATE KEY UPDATE name=name";

if ($conn->query($test_sql) === TRUE) {
    echo "Test record inserted successfully.<br>";
} else {
    echo "Error inserting test record: " . $conn->error . "<br>";
}

// Count records
$result = $conn->query("SELECT COUNT(*) as count FROM subscribers");
$row = $result->fetch_assoc();
echo "Total records in subscribers table: " . $row['count'] . "<br>";

// Show table structure
echo "<h3>Table Structure:</h3>";
$structure = $conn->query("DESCRIBE subscribers");
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
while ($row = $structure->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['Field'] . "</td>";
    echo "<td>" . $row['Type'] . "</td>";
    echo "<td>" . $row['Null'] . "</td>";
    echo "<td>" . $row['Key'] . "</td>";
    echo "<td>" . $row['Default'] . "</td>";
    echo "<td>" . $row['Extra'] . "</td>";
    echo "</tr>";
}
echo "</table>";

$conn->close();

echo "<h3 style='color: green;'>Database setup completed!</h3>";
echo "<p>Now test the form at: <a href='index.html'>index.html</a></p>";
?>