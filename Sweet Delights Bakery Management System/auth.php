<?php
session_start();
include "connect.php";

$message = "";

/* SIGNUP */
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = $_POST['password'];
    
    // Hash the password for security
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if(mysqli_num_rows($check) > 0){
        $message = "<div class='error'>Email already exists</div>";
    }else{
        $sql = "INSERT INTO users(name, email, password) VALUES('$name', '$email', '$hashed_password')";
        
        if(mysqli_query($conn, $sql)){
            $message = "<div class='success'>Signup successful! Please login</div>";
        } else {
            $message = "<div class='error'>Error: " . mysqli_error($conn) . "</div>";
        }
    }
}

/* LOGIN */
if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    
    if(mysqli_num_rows($result) == 1){
        $user = mysqli_fetch_assoc($result);
        
        // Verify the password against the hashed version
        if(password_verify($pass, $user['password'])){
            $_SESSION['user'] = $user['email'];
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            
            // Redirect to index.php
            header("Location: dashboard.php");
            exit();
        } else {
            $message = "<div class='error'>Invalid email or password</div>";
        }
    } else {
        $message = "<div class='error'>Invalid email or password</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login | Signup</title>
    <link rel="stylesheet" href="auth.css">
    <style>
        .error { color: red; background: #ffe6e6; padding: 10px; border-radius: 5px; }
        .success { color: green; background: #e6ffe6; padding: 10px; border-radius: 5px; }
        .auth-box { max-width: 400px; margin: 50px auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px; }
        .top-buttons { display: flex; gap: 10px; margin-bottom: 20px; }
        .top-buttons button { flex: 1; padding: 10px; cursor: pointer; }
        form { display: none; }
        form.active { display: block; }
        input, button { width: 100%; padding: 10px; margin: 5px 0; box-sizing: border-box; }
    </style>
</head>
<body>

<div class="auth-box">
    <div class="top-buttons">
        <button onclick="showLogin()">Login</button>
        <button onclick="showSignup()">Signup</button>
        <?php if(isset($_SESSION['user'])): ?>
           <button type="button" onclick="logout()">Logout</button>

        <?php endif; ?>
    </div>

    <div class="message"><?php echo $message; ?></div>

    <!-- LOGIN FORM -->
    <form method="post" id="loginForm" class="active">
        <h2>Login</h2>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button class="submit-btn" name="login">Login</button>
    </form>

    <!-- SIGNUP FORM -->
    <form method="post" id="signupForm">
        <h2>Signup</h2>
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button class="submit-btn" name="signup">Signup</button>
    </form>

</div>

<script>
function showLogin(){
    document.getElementById("loginForm").classList.add("active");
    document.getElementById("signupForm").classList.remove("active");
}
function showSignup(){
    document.getElementById("signupForm").classList.add("active");
    document.getElementById("loginForm").classList.remove("active");
}
function logout(){
    window.location.href="logout.php";
}
</script>

</body>
</html>