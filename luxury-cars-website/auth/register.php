<?php
require_once '../config/db.php';
require_once '../config/session.php';

// Redirect if already logged in
if (isLoggedIn()) {
    header('Location: /public/index.php');
    exit();
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Validate input
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = 'Please fill in all fields.';
    } elseif ($password !== $confirm_password) {
        $error = 'Passwords do not match.';
    } elseif (strlen($password) < 8) {
        $error = 'Password must be at least 8 characters long.';
    } else {
        // Check if email exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        
        if ($stmt->rowCount() > 0) {
            $error = 'Email already registered.';
        } else {
            // Hash password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            // Insert new user
            $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            
            if ($stmt->execute([$name, $email, $hashed_password])) {
                $success = 'Registration successful! You can now login.';
                // Clear form
                $name = $email = '';
            } else {
                $error = 'Registration failed. Please try again.';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Luxury Cars</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;600&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="form-container">
        <div class="form-card">
            <h2 class="form-title">Create Account</h2>
            
            <?php if ($error): ?>
                <div style="background: rgba(239, 68, 68, 0.1); color: #ef4444; padding: 1rem; border-radius: 10px; margin-bottom: 1rem;">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <div style="background: rgba(34, 197, 94, 0.1); color: #22c55e; padding: 1rem; border-radius: 10px; margin-bottom: 1rem;">
                    <?php echo htmlspecialchars($success); ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label class="form-label" for="name">Full Name</label>
                    <input type="text" class="form-input" id="name" name="name" value="<?php echo htmlspecialchars($name ?? ''); ?>" required placeholder="Enter your full name">
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="email">Email Address</label>
                    <input type="email" class="form-input" id="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>" required placeholder="Enter your email">
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" class="form-input" id="password" name="password" required placeholder="Minimum 8 characters">
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-input" id="confirm_password" name="confirm_password" required placeholder="Confirm your password">
                </div>
                
                <button type="submit" class="cta-button" style="width: 100%; margin-top: 1rem;">
                    <i class="fas fa-user-plus"></i> Register
                </button>
            </form>
            
            <div style="text-align: center; margin-top: 2rem; color: var(--silver-light);">
                Already have an account? 
                <a href="login.php" style="color: var(--gold); text-decoration: none;">Login here</a>
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