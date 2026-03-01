<?php
session_start();
require_once '../config/database.php';

// Simple authentication (same as above)
$admin_user = 'admin';
$admin_pass = 'password123';

if (!isset($_SERVER['PHP_AUTH_USER']) || 
    !($_SERVER['PHP_AUTH_USER'] == $admin_user && 
      $_SERVER['PHP_AUTH_PW'] == $admin_pass)) {
    header('WWW-Authenticate: Basic realm="Skiller Admin"');
    header('HTTP/1.0 401 Unauthorized');
    exit;
}

// Get subscribers
$conn = getConnection();
if ($conn) {
    $result = $conn->query("SELECT * FROM subscribers ORDER BY subscription_date DESC");
    
    if ($result) {
        // Set headers for CSV download
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=skiller-subscribers-' . date('Y-m-d') . '.csv');
        
        // Create output stream
        $output = fopen('php://output', 'w');
        
        // Add headers
        fputcsv($output, ['ID', 'Name', 'Email', 'Interest', 'Subscription Date', 'Status', 'IP Address']);
        
        // Add data rows
        while ($row = $result->fetch_assoc()) {
            fputcsv($output, [
                $row['id'],
                $row['name'],
                $row['email'],
                $row['interest'],
                $row['subscription_date'],
                $row['is_active'] ? 'Active' : 'Inactive',
                $row['ip_address']
            ]);
        }
        
        fclose($output);
    }
    $conn->close();
}
?>