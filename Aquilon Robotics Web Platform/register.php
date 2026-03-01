<?php
require_once 'classes/User.php';

$user = new User();
$message = '';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $user->username = $_POST['username'];
    $user->email = $_POST['email'];
    $user->password = $_POST['password'];
    $user->full_name = $_POST['full_name'];
    $confirm_password = $_POST['confirm_password'];

    // Validation
    if($user->password !== $confirm_password) {
        $message = "Passwords do not match!";
    } elseif($user->userExists()) {
        $message = "Username or email already exists!";
    } elseif(strlen($user->password) < 6) {
        $message = "Password must be at least 6 characters long!";
    } else {
        if($user->register()) {
            $message = "Registration successful! You can now login.";
            header("refresh:3;url=login.php");
        } else {
            $message = "Registration failed. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | AQUILON Robotics</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0a1f44 0%, #1a365d 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .auth-container {
            background: white;
            border-radius: 16px;
            padding: 40px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.3);
        }
        
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .logo-icon {
            color: #2a7de1;
            font-size: 3rem;
            margin-bottom: 10px;
        }
        
        .logo-text {
            font-family: 'Poppins', sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: #0a1f44;
        }
        
        .auth-form h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #0a1f44;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group input {
            width: 100%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s;
        }
        
        .form-group input:focus {
            outline: none;
            border-color: #2a7de1;
            box-shadow: 0 0 0 3px rgba(42, 125, 225, 0.1);
        }
        
        .btn-primary {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #2a7de1 0%, #0a1f44 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(42, 125, 225, 0.3);
        }
        
        .message {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 8px;
            text-align: center;
        }
        
        .success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .auth-links {
            text-align: center;
            margin-top: 20px;
        }
        
        .auth-links a {
            color: #2a7de1;
            text-decoration: none;
        }
        
        .auth-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="logo">
            <div class="logo-icon"><i class="fas fa-robot"></i></div>
            <div class="logo-text">AQUILON</div>
        </div>
        
        <?php if($message): ?>
            <div class="message <?php echo strpos($message, 'successful') !== false ? 'success' : 'error'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        
        <div class="auth-form">
            <h2>Create Account</h2>
            <form method="POST" action="">
                <div class="form-group">
                    <input type="text" name="full_name" placeholder="Full Name" required>
                </div>
                <div class="form-group">
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email Address" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" required minlength="6">
                </div>
                <div class="form-group">
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required minlength="6">
                </div>
                <button type="submit" class="btn-primary">Register</button>
            </form>
            
            <div class="auth-links">
                <p>Already have an account? <a href="login.php">Login here</a></p>
                <p><a href="index.php">← Back to Home</a></p>
            </div>
        </div>
    </div>
    
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>