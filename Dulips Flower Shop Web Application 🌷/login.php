<?php
// login.php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    
    // Validate input
    if (empty($username) || empty($password)) {
        $_SESSION['error_message'] = "Please fill in all fields";
        header("Location: index.php");
        exit();
    }
    
    // Connect to database
    $conn = getDBConnection();
    
    // Prepare and execute query
    $stmt = $conn->prepare("SELECT id, username, email, password FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['logged_in'] = true;
            
            $_SESSION['success_message'] = "Welcome back, " . $user['username'] . "!";
            header("Location: index.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Invalid password";
        }
    } else {
        $_SESSION['error_message'] = "User not found";
    }
    
    $stmt->close();
    $conn->close();
    
    header("Location: index.php");
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>