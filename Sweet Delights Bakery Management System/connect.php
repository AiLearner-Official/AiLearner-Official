<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = ""; // Default XAMPP password is empty
$database = "bakery_db";

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error() . 
        ".<br>Please make sure:<br>
        1. XAMPP is running (Apache and MySQL)<br>
        2. Database 'bakery_db' exists<br>
        3. Username and password are correct");
}

// Set charset to UTF-8
mysqli_set_charset($conn, "utf8");

// Optional: Uncomment to test connection
// echo "Connected successfully to database: " . $database;
?>