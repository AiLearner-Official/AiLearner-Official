<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $service = htmlspecialchars($_POST['service']);
    $message = htmlspecialchars($_POST['message']);
    
    // Basic validation
    if (empty($name) || empty($email) || empty($phone) || empty($service)) {
        $_SESSION['error'] = "Please fill in all required fields";
    } else {
        // Process the booking (in real app, save to database and send email)
        
        // Generate appointment ID
        $appointment_id = 'EAS' . date('Ymd') . rand(1000, 9999);
        
        // Success message
        $_SESSION['success'] = "
            <strong>Thank you, $name!</strong><br>
            Your appointment has been scheduled.<br>
            <strong>Appointment ID:</strong> $appointment_id<br>
            <strong>Service:</strong> $service<br>
            We will contact you at $email to confirm details.
        ";
        
        // In a real application, you would:
        // 1. Save to database
        // 2. Send email confirmation
        // 3. Send notification to admin
    }
    
    // Redirect back
    header('Location: index.php#contact');
    exit();
}
?>