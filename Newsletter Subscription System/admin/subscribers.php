<?php
session_start();
require_once '../config/database.php';

// Simple authentication (replace with proper authentication)
$admin_user = 'admin';
$admin_pass = 'password123'; // Change this!

if (!isset($_SERVER['PHP_AUTH_USER']) || 
    !($_SERVER['PHP_AUTH_USER'] == $admin_user && 
      $_SERVER['PHP_AUTH_PW'] == $admin_pass)) {
    header('WWW-Authenticate: Basic realm="Skiller Admin"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Access denied';
    exit;
}

// Get subscribers from database
$conn = getConnection();
$subscribers = [];
$total = 0;

if ($conn) {
    $result = $conn->query("SELECT * FROM subscribers ORDER BY subscription_date DESC");
    if ($result) {
        $subscribers = $result->fetch_all(MYSQLI_ASSOC);
        $total = count($subscribers);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skiller - Subscribers Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background: #0f172a;
            color: #e2e8f0;
            line-height: 1.6;
        }
        
        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .admin-header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #3b82f6;
        }
        
        .admin-header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: rgba(30, 41, 59, 0.8);
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }
        
        .stat-card h3 {
            font-size: 2rem;
            color: #3b82f6;
            margin-bottom: 10px;
        }
        
        .subscribers-table {
            background: rgba(30, 41, 59, 0.8);
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        thead {
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
        }
        
        th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
        }
        
        tbody tr {
            border-bottom: 1px solid rgba(59, 130, 246, 0.1);
        }
        
        tbody tr:hover {
            background: rgba(59, 130, 246, 0.1);
        }
        
        td {
            padding: 15px;
        }
        
        .interest-badge {
            display: inline-block;
            padding: 5px 15px;
            background: rgba(59, 130, 246, 0.2);
            color: #3b82f6;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .active-badge {
            display: inline-block;
            padding: 5px 10px;
            background: rgba(34, 197, 94, 0.2);
            color: #22c55e;
            border-radius: 20px;
            font-size: 0.85rem;
        }
        
        .export-btn {
            display: inline-block;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            margin-top: 20px;
            transition: transform 0.3s ease;
        }
        
        .export-btn:hover {
            transform: translateY(-3px);
        }
        
        .no-data {
            text-align: center;
            padding: 40px;
            opacity: 0.7;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1>Skiller Subscribers Admin</h1>
            <p>Manage and view newsletter subscribers</p>
        </div>
        
        <div class="stats">
            <div class="stat-card">
                <h3><?php echo $total; ?></h3>
                <p>Total Subscribers</p>
            </div>
            <div class="stat-card">
                <h3><?php echo count(array_filter($subscribers, fn($s) => $s['is_active'])); ?></h3>
                <p>Active Subscribers</p>
            </div>
            <div class="stat-card">
                <h3><?php echo date('Y-m-d'); ?></h3>
                <p>Last Updated</p>
            </div>
        </div>
        
        <div class="subscribers-table">
            <?php if ($total > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Interest</th>
                            <th>Subscription Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($subscribers as $subscriber): ?>
                            <tr>
                                <td><?php echo $subscriber['id']; ?></td>
                                <td><?php echo htmlspecialchars($subscriber['name']); ?></td>
                                <td><?php echo htmlspecialchars($subscriber['email']); ?></td>
                                <td>
                                    <span class="interest-badge">
                                        <?php 
                                        $interests = [
                                            'web' => 'Web Dev',
                                            'python' => 'Python',
                                            'mobile' => 'Mobile',
                                            'java' => 'Java',
                                            'all' => 'All'
                                        ];
                                        echo $interests[$subscriber['interest']] ?? $subscriber['interest'];
                                        ?>
                                    </span>
                                </td>
                                <td><?php echo date('Y-m-d H:i', strtotime($subscriber['subscription_date'])); ?></td>
                                <td>
                                    <span class="active-badge">
                                        <?php echo $subscriber['is_active'] ? 'Active' : 'Inactive'; ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                
                <div style="text-align: center; padding: 20px;">
                    <a href="export.php" class="export-btn">Export to CSV</a>
                </div>
            <?php else: ?>
                <div class="no-data">
                    <h3>No subscribers yet</h3>
                    <p>Subscribers will appear here once they sign up.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
<?php if ($conn) $conn->close(); ?>