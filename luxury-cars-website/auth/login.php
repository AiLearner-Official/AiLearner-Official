<?php
require_once '../config/db.php';
require_once '../config/session.php';

// Redirect if already logged in
if (isLoggedIn()) {
    header('Location: /public/index.php');
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    // Validate input
    if (empty($email) || empty($password)) {
        $error = 'Please fill in all fields.';
    } else {
        // Check user credentials
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            
            // Redirect based on role
            if ($user['role'] === 'admin') {
                header('Location: /admin/dashboard.php');
            } else {
                header('Location: /public/index.php');
            }
            exit();
        } else {
            $error = 'Invalid email or password.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Luxury Cars</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;600&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="form-container">
        <div class="form-card">
            <h2 class="form-title">Welcome Back</h2>
            
            <?php if ($error): ?>
                <div style="background: rgba(239, 68, 68, 0.1); color: #ef4444; padding: 1rem; border-radius: 10px; margin-bottom: 1rem;">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label class="form-label" for="email">Email Address</label>
                    <input type="email" class="form-input" id="email" name="email" required placeholder="Enter your email">
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" class="form-input" id="password" name="password" required placeholder="Enter your password">
                </div>
                
                <button type="submit" class="cta-button" style="width: 100%; margin-top: 1rem;">
                    <i class="fas fa-sign-in-alt"></i> Login
                </button>
            </form>
            
            <div style="text-align: center; margin-top: 2rem; color: var(--silver-light);">
                Don't have an account? 
                <a href="register.php" style="color: var(--gold); text-decoration: none;">Register here</a>
            </div>
            
            <div style="text-align: center; margin-top: 1rem;">
                <a href="/public/index.php" style="color: var(--silver-light); text-decoration: none;">
                    <i class="fas fa-arrow-left"></i> Back to Home
                </a>
            </div>
        </div>
    </div>
</body>
</html>