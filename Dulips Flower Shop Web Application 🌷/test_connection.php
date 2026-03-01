<?php
// Test database connection
$conn = new mysqli('localhost', 'root', '', 'flower_shop_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "✅ Database connected successfully!<br>";

// Check if users table exists
$result = $conn->query("SHOW TABLES LIKE 'users'");
if ($result->num_rows > 0) {
    echo "✅ Users table exists<br>";
} else {
    echo "❌ Users table doesn't exist<br>";
}

// Test insert
$test_username = "testuser_" . time();
$test_email = "test" . time() . "@example.com";
$test_password = password_hash("test123", PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $test_username, $test_email, $test_password);

if ($stmt->execute()) {
    echo "✅ Test user inserted successfully!<br>";
    echo "Username: $test_username<br>";
    echo "Email: $test_email<br>";
    
    // Delete test user
    $conn->query("DELETE FROM users WHERE username = '$test_username'");
    echo "✅ Test user cleaned up<br>";
} else {
    echo "❌ Error inserting test user: " . $stmt->error . "<br>";
}

$conn->close();
?>