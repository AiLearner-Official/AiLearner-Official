<?php
include "connect.php";

echo "<h2>Testing Database Connection</h2>";

if($conn){
    echo "<p style='color:green;'>✓ Database connected successfully!</p>";
    
    // Test query
    $result = mysqli_query($conn, "SHOW TABLES");
    if($result){
        echo "<p>Tables in database:</p>";
        echo "<ul>";
        while($row = mysqli_fetch_array($result)){
            echo "<li>" . $row[0] . "</li>";
        }
        echo "</ul>";
    }
} else {
    echo "<p style='color:red;'>✗ Database connection failed!</p>";
}
?>