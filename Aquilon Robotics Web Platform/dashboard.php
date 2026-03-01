<?php
require_once 'classes/User.php';
require_once 'classes/Session.php';
require_once 'config/database.php';

$database = new Database();
$db = $database->getConnection();
$session = new Session($db);
$user = new User();

// Check if user is logged in
if(!$session->validateSession()) {
    header("Location: login.php");
    exit();
}

$current_user = $user->getUserById($session->getUserId());

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout'])) {
    $session->destroySession();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | AQUILON Robotics</title>
    <style>
        /* Add dashboard styles */
        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .dashboard-header {
            background: white;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .user-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .user-details h1 {
            color: #0a1f44;
            margin-bottom: 5px;
        }
        
        .user-details p {
            color: #666;
        }
        
        .logout-btn {
            background: #dc3545;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
        }
        
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }
        
        .dashboard-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .dashboard-card h3 {
            color: #0a1f44;
            margin-bottom: 15px;
            border-bottom: 2px solid #2a7de1;
            padding-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="dashboard-header">
            <div class="user-info">
                <div class="user-details">
                    <h1>Welcome, <?php echo htmlspecialchars($current_user['full_name']); ?>!</h1>
                    <p>Role: <?php echo ucfirst($current_user['role']); ?> | Member since: <?php echo date('F Y', strtotime($current_user['created_at'])); ?></p>
                </div>
                <form method="POST">
                    <button type="submit" name="logout" class="logout-btn">Logout</button>
                </form>
            </div>
        </div>
        
        <div class="dashboard-grid">
            <div class="dashboard-card">
                <h3>Your Profile</h3>
                <p><strong>Username:</strong> <?php echo htmlspecialchars($current_user['username']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($current_user['email']); ?></p>
                <p><strong>Account Status:</strong> <span style="color: green;"><?php echo ucfirst($current_user['status']); ?></span></p>
            </div>
            
            <div class="dashboard-card">
                <h3>Quick Actions</h3>
                <ul style="list-style: none; padding: 0;">
                    <li><a href="edit_profile.php">Edit Profile</a></li>
                    <li><a href="change_password.php">Change Password</a></li>
                    <li><a href="pre_order.php">Pre-order AQUILON</a></li>
                    <li><a href="support.php">Contact Support</a></li>
                </ul>
            </div>
            
            <div class="dashboard-card">
                <h3>Your Orders</h3>
                <p>No orders yet. <a href="#products">Browse products</a></p>
            </div>
        </div>
    </div>
</body>
</html>