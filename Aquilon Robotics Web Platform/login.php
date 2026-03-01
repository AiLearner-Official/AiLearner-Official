<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once 'config/database.php';
require_once 'classes/Session.php';
require_once 'classes/User.php';





$message = '';
$login_success = false;

// Simple login logic (without database for testing)
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Simple validation
    if(empty($username) || empty($password)) {
        $message = '<div class="alert alert-error">Please fill in all fields</div>';
    } 
    // Test credentials: username: admin, password: admin123
    




else {

    $user = new User();

    // Form values User object me daalna
    $user->username = $username;
    $user->email    = $username; // email ya username dono allow
    $user->password = $password;

    if($user->login()) {

        // Session set
        $_SESSION['user_id']   = $user->id;
        $_SESSION['username']  = $user->username;
        $_SESSION['full_name'] = $user->full_name;
        $_SESSION['role']      = $user->role;

        $message = '<div class="alert alert-success">Login successful! Redirecting...</div>';
        echo '<meta http-equiv="refresh" content="2;url=dashboard.php">';

    } else {
        $message = '<div class="alert alert-error">Invalid username or password</div>';
    }
}

    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | AQUILON - The Future of Robotics</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* ===== RESET & BASE ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        :root {
            --primary-blue: #0a1f44;
            --secondary-blue: #1a365d;
            --accent-blue: #2a7de1;
            --gradient-blue: linear-gradient(135deg, #2a7de1 0%, #0a1f44 100%);
            --light-blue: #eef5ff;
            --white: #ffffff;
            --gray-light: #f8f9fa;
            --gray-medium: #6c757d;
            --shadow: 0 10px 30px rgba(10, 31, 68, 0.1);
            --shadow-heavy: 0 20px 50px rgba(10, 31, 68, 0.2);
            --border-radius: 12px;
            --transition: all 0.3s ease;
        }
        
        html {
            scroll-behavior: smooth;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            color: var(--primary-blue);
            line-height: 1.6;
            overflow-x: hidden;
        }
        
        h1, h2, h3, h4 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }
        
        /* ===== LOGIN PAGE LAYOUT ===== */
        .login-page {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: linear-gradient(135deg, #0a1f44 0%, #1a365d 100%);
        }
        
        /* ===== HEADER (Same as Main Site) ===== */
        .login-header-nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            z-index: 1000;
            box-shadow: 0 5px 20px rgba(10, 31, 68, 0.05);
            transition: var(--transition);
        }
        
        .nav-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }
        
        .logo {
            display: flex;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1.8rem;
            color: var(--primary-blue);
            text-decoration: none;
        }
        
        .logo-icon {
            color: var(--accent-blue);
            margin-right: 10px;
            font-size: 2rem;
        }
        
        .nav-links {
            display: flex;
            list-style: none;
        }
        
        .nav-links li {
            margin: 0 15px;
        }
        
        .nav-links a {
            text-decoration: none;
            color: var(--primary-blue);
            font-weight: 500;
            font-size: 1rem;
            padding: 8px 0;
            position: relative;
            transition: var(--transition);
        }
        
        .nav-links a:hover {
            color: var(--accent-blue);
        }
        
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent-blue);
            transition: var(--transition);
        }
        
        .nav-links a:hover::after {
            width: 100%;
        }
        
        .nav-right {
            display: flex;
            align-items: center;
        }
        
        .btn {
            display: inline-block;
            padding: 12px 25px;
            border-radius: 50px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            text-decoration: none;
            transition: var(--transition);
            cursor: pointer;
            border: none;
            font-size: 1rem;
        }
        
        .btn-primary {
            background: var(--gradient-blue);
            color: white;
            box-shadow: var(--shadow);
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-heavy);
        }
        
        .btn-secondary {
            background: transparent;
            color: var(--primary-blue);
            border: 2px solid rgba(10, 31, 68, 0.2);
        }
        
        .btn-secondary:hover {
            border-color: var(--accent-blue);
            color: var(--accent-blue);
            transform: translateY(-3px);
        }
        
        /* ===== MAIN LOGIN CONTENT ===== */
        .login-main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 150px 20px 80px;
            position: relative;
            overflow: hidden;
        }
        
        .login-main-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><path fill="rgba(255,255,255,0.03)" d="M0,0H1000V1000H0Z"/><path fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="2" d="M0,0H1000V1000H0Z"/><circle cx="500" cy="500" r="200" fill="none" stroke="rgba(255,255,255,0.03)" stroke-width="2"/></svg>');
            background-size: cover;
        }
        
        /* Login Box */
        .login-box {
            background: white;
            border-radius: 20px;
            padding: 50px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.3);
            position: relative;
            z-index: 1;
            animation: fadeIn 0.8s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Login Header */
        .login-box-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .login-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            color: var(--primary-blue);
        }
        
        .login-logo i {
            font-size: 3rem;
            color: var(--accent-blue);
            margin-right: 15px;
        }
        
        .login-logo h1 {
            font-size: 2.5rem;
            font-weight: 700;
        }
        
        .login-box-header h2 {
            font-size: 1.8rem;
            color: var(--primary-blue);
            margin-bottom: 10px;
        }
        
        .login-box-header p {
            color: var(--gray-medium);
            font-size: 1.1rem;
        }
        
        /* Alert Messages */
        .alert {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            font-size: 0.95rem;
            text-align: center;
        }
        
        .alert-error {
            background: #ffe6e6;
            color: #d63031;
            border: 1px solid #ffcccc;
        }
        
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        /* Form Styles */
        .login-form {
            margin-top: 30px;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--primary-blue);
            font-size: 0.95rem;
        }
        
        .form-group input {
            width: 100%;
            padding: 15px 20px;
            border: 1px solid rgba(10, 31, 68, 0.2);
            border-radius: 12px;
            font-size: 1rem;
            font-family: 'Inter', sans-serif;
            transition: var(--transition);
            background: var(--light-blue);
        }
        
        .form-group input:focus {
            outline: none;
            border-color: var(--accent-blue);
            box-shadow: 0 0 0 3px rgba(42, 125, 225, 0.1);
            background: white;
        }
        
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
            cursor: pointer;
        }
        
        .remember-me input {
            width: auto;
            margin-right: 8px;
        }
        
        .forgot-password {
            color: var(--accent-blue);
            text-decoration: none;
            font-size: 0.95rem;
            transition: var(--transition);
        }
        
        .forgot-password:hover {
            text-decoration: underline;
        }
        
        /* Login Button */
        .btn-login {
            width: 100%;
            padding: 16px;
            background: var(--gradient-blue);
            color: white;
            border: none;
            border-radius: 50px;
            font-family: 'Poppins', sans-serif;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: var(--shadow);
            margin-top: 10px;
        }
        
        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-heavy);
        }
        
        .btn-login:active {
            transform: translateY(-1px);
        }
        
        /* Social Login (Optional) */
        .social-login-divider {
            text-align: center;
            margin: 30px 0;
            position: relative;
            color: var(--gray-medium);
        }
        
        .social-login-divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: rgba(10, 31, 68, 0.1);
        }
        
        .social-login-divider span {
            background: white;
            padding: 0 15px;
            position: relative;
            z-index: 1;
        }
        
        .social-login-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-bottom: 30px;
        }
        
        .social-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .social-btn.google {
            background: #DB4437;
        }
        
        .social-btn.facebook {
            background: #4267B2;
        }
        
        .social-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        
        /* Footer Links */
        .login-footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(10, 31, 68, 0.1);
        }
        
        .login-footer p {
            color: var(--gray-medium);
            margin-bottom: 10px;
        }
        
        .login-footer a {
            color: var(--accent-blue);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }
        
        .login-footer a:hover {
            text-decoration: underline;
        }
        
        /* ===== FOOTER (Same as Main Site) ===== */
        .login-page-footer {
            background: var(--primary-blue);
            color: var(--white);
            padding: 50px 0 20px;
        }
        
        .footer-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 30px;
        }
        
        .footer-logo {
            display: flex;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1.8rem;
            color: var(--white);
            margin-bottom: 20px;
        }
        
        .footer-description {
            opacity: 0.8;
            margin-bottom: 20px;
            max-width: 300px;
        }
        
        .social-links {
            display: flex;
            gap: 15px;
        }
        
        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: var(--white);
            text-decoration: none;
            transition: var(--transition);
        }
        
        .social-links a:hover {
            background: var(--accent-blue);
            transform: translateY(-5px);
        }
        
        .footer-section h4 {
            font-size: 1.3rem;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }
        
        .footer-section h4::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--accent-blue);
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 12px;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: var(--transition);
        }
        
        .footer-links a:hover {
            color: var(--white);
            padding-left: 5px;
        }
        
        .footer-contact {
            list-style: none;
        }
        
        .footer-contact li {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            opacity: 0.8;
        }
        
        .footer-contact i {
            margin-right: 10px;
            color: var(--accent-blue);
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            opacity: 0.7;
            font-size: 0.9rem;
        }
        
        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .login-box {
                padding: 40px 30px;
            }
            
            .login-logo h1 {
                font-size: 2rem;
            }
            
            .login-box-header h2 {
                font-size: 1.5rem;
            }
            
            .login-box-header p {
                font-size: 1rem;
            }
            
            .form-options {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
        }
        
        @media (max-width: 480px) {
            .login-box {
                padding: 30px 20px;
            }
            
            .login-main-content {
                padding: 120px 15px 40px;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
                gap: 30px;
            }
        }
    </style>
</head>
<body class="login-page">
    <!-- Header -->
    <header class="login-header-nav">
        <div class="nav-container">
            <nav class="navbar">
                <div class="logo">
                    <span class="logo-icon"><i class="fas fa-robot"></i></span>
                    <span class="logo-text">AQUILON</span>
                </div>
                
                <ul class="nav-links">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="index.html#products">Products</a></li>
                    <li><a href="index.html#features">Features</a></li>
                    <li><a href="index.html#technology">Technology</a></li>
                    <li><a href="index.html#about">About</a></li>
                </ul>
                
                <div class="nav-right">
                    <a href="register.php" class="btn btn-primary">Register</a>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Login Content -->
    <main class="login-main-content">
        <div class="login-box">
            <div class="login-box-header">
                <div class="login-logo">
                    <i class="fas fa-robot"></i>
                    <h1>AQUILON</h1>
                </div>
                <h2>Welcome Back</h2>
                <p>Sign in to your account to continue</p>
            </div>
            
            <?php echo $message; ?>
            
            <form class="login-form" method="POST" action="" id="loginForm">
                <div class="form-group">
                    <label for="username">Username or Email</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username or email" required value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                
                <div class="form-options">
                    <label class="remember-me">
                        <input type="checkbox" name="remember" id="remember">
                        <span>Remember me</span>
                    </label>
                    <a href="forgot_password.php" class="forgot-password">Forgot Password?</a>
                </div>
                
                <button type="submit" class="btn-login">Sign In</button>
                
                <!-- Optional Social Login -->
                <!--
                <div class="social-login-divider">
                    <span>Or continue with</span>
                </div>
                
                <div class="social-login-buttons">
                    <a href="#" class="social-btn google">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="social-btn facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>
                -->
            </form>
            
            <div class="login-footer">
                <p>Don't have an account? <a href="register.php">Sign up here</a></p>
                <p><a href="index.php">← Back to Homepage</a></p>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="login-page-footer">
        <div class="footer-container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="footer-logo">
                        <span class="logo-icon"><i class="fas fa-robot"></i></span>
                        <span class="logo-text">AQUILON</span>
                    </div>
                    <p class="footer-description">Creating intelligent robotic solutions for a better tomorrow.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="index.html#products">Products</a></li>
                        <li><a href="index.html#features">Features</a></li>
                        <li><a href="index.html#technology">Technology</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4>Support</h4>
                    <ul class="footer-links">
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4>Contact</h4>
                    <ul class="footer-contact">
                        <li><i class="fas fa-map-marker-alt"></i> 123 Innovation Drive, Tech City</li>
                        <li><i class="fas fa-phone"></i> +1 (555) 123-4567</li>
                        <li><i class="fas fa-envelope"></i> info@aquilon-robotics.com</li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 AQUILON Robotics. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript for interactivity -->
    <script>
        // Form validation
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value.trim();
            
            if(!username || !password) {
                e.preventDefault();
                alert('Please fill in all fields');
                return false;
            }
            
            // Show loading state
            const submitBtn = this.querySelector('.btn-login');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Signing In...';
            submitBtn.disabled = true;
            
            // Re-enable button after 3 seconds (in case of error)
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 3000);
        });
        
        // Toggle password visibility (optional feature)
        const togglePassword = document.createElement('span');
        togglePassword.innerHTML = '<i class="fas fa-eye"></i>';
        togglePassword.style.cssText = `
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--gray-medium);
        `;
        
        const passwordField = document.getElementById('password');
        passwordField.style.position = 'relative';
        passwordField.parentNode.style.position = 'relative';
        passwordField.parentNode.appendChild(togglePassword);
        
        togglePassword.addEventListener('click', function() {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
        });
        
        // Remember me functionality
        const rememberCheckbox = document.getElementById('remember');
        const usernameField = document.getElementById('username');
        
        // Check if credentials are stored
        if(localStorage.getItem('rememberMe') === 'true' && localStorage.getItem('username')) {
            usernameField.value = localStorage.getItem('username');
            rememberCheckbox.checked = true;
        }
        
        // Store credentials if remember me is checked
        document.getElementById('loginForm').addEventListener('submit', function() {
            if(rememberCheckbox.checked) {
                localStorage.setItem('rememberMe', 'true');
                localStorage.setItem('username', usernameField.value);
            } else {
                localStorage.removeItem('rememberMe');
                localStorage.removeItem('username');
            }
        });
    </script>
</body>
</html>