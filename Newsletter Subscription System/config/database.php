<?php
// Database configuration for XAMPP
// XAMPP default settings:
// Host: localhost
// Username: root
// Password: (empty)

define('DB_HOST', 'localhost');
define('DB_USER', 'root');     // XAMPP default username
define('DB_PASS', '');         // XAMPP default password is empty
define('DB_NAME', 'skiller_db');

// Function to connect to database
function getConnection() {
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // Set charset
    mysqli_set_charset($conn, "utf8mb4");
    
    return $conn;
}

// Test function
function testConnection() {
    $conn = getConnection();
    if ($conn) {
        echo "Database connection successful!<br>";
        
        // Test query
        $result = mysqli_query($conn, "SELECT COUNT(*) as count FROM subscribers");
        $row = mysqli_fetch_assoc($result);
        echo "Subscribers in database: " . $row['count'];
        
        mysqli_close($conn);
    }
}
?>