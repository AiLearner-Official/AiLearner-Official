<?php
// Test database connection
$host = 'localhost';
$user = 'root';  // Change if different
$pass = '';      // Change if different
$db = 'skiller_db';

// Try to connect
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Database connected successfully!<br>";
    
    // Check if table exists
    $result = $conn->query("SHOW TABLES LIKE 'subscribers'");
    if ($result->num_rows > 0) {
        echo "Table 'subscribers' exists.<br>";
        
        // Show table structure
        echo "<br>Table structure:<br>";
        $structure = $conn->query("DESCRIBE subscribers");
        echo "<pre>";
        while ($row = $structure->fetch_assoc()) {
            print_r($row);
        }
        echo "</pre>";
    } else {
        echo "Table 'subscribers' does NOT exist. Creating it now...<br>";
        
        $sql = "CREATE TABLE subscribers (
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
            echo "Table created successfully!";
        } else {
            echo "Error creating table: " . $conn->error;
        }
    }
    
    // Count existing records
    $count = $conn->query("SELECT COUNT(*) as total FROM subscribers");
    $row = $count->fetch_assoc();
    echo "<br>Total subscribers: " . $row['total'];
    
    $conn->close();
}
?>