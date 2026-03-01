<?php
// signup.php
require_once 'config.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Debug: Check if form is submitted
echo "<pre>";
echo "Form submitted: " . ($_SERVER['REQUEST_METHOD'] === 'POST' ? 'YES' : 'NO') . "\n";
print_r($_POST);
echo "</pre>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    echo "Username: $username<br>";
    echo "Email: $email<br>";
    
    // Validate input
    $errors = [];
    
    if (empty($username)) {
        $errors[] = "Username is required";
    }
    
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
    
    if (empty($password)) {
        $errors[] = "Password is required";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters";
    }
    
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match";
    }
    
    // Display errors if any
    if (!empty($errors)) {
        echo "<div style='color: red; padding: 10px; border: 1px solid red; margin: 10px;'>";
        echo "<h3>Errors:</h3>";
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
        echo "</div>";
    } else {
        echo "<p>No validation errors. Connecting to database...</p>";
        
        // Connect to database
        $conn = getDBConnection();
        
        // Check if username or email already exists
        $checkStmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $checkStmt->bind_param("ss", $username, $email);
        $checkStmt->execute();
        $checkStmt->store_result();
        
        if ($checkStmt->num_rows > 0) {
            echo "<div style='color: red;'>Username or email already exists</div>";
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            echo "Password hashed successfully<br>";
            
            // Insert new user
            $insertStmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $insertStmt->bind_param("sss", $username, $email, $hashed_password);
            
            if ($insertStmt->execute()) {
                echo "<div style='color: green; padding: 20px; background: #d4edda; border: 1px solid #c3e6cb;'>";
                echo "<h3>✅ Registration Successful!</h3>";
                echo "<p>You can now <a href='index.php'>login here</a></p>";
                echo "</div>";
                
                // Redirect after 3 seconds
                echo "<script>
                    setTimeout(function() {
                        window.location.href = 'index.php';
                    }, 3000);
                </script>";
            } else {
                echo "<div style='color: red;'>Error: " . $insertStmt->error . "</div>";
            }
            
            $insertStmt->close();
        }
        
        $checkStmt->close();
        $conn->close();
    }
} else {
    echo "<div style='color: orange;'>No form data submitted. Please go back and fill the form.</div>";
}
?>