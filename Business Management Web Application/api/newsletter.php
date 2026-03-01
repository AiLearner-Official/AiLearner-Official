<?php
// api/newsletter.php - Handle Newsletter Subscription

// Set header for JSON response
header('Content-Type: application/json');

// Include config file
require_once '../config.php';  // Adjust path if needed (assuming api/ is a subfolder)

// Get POST data
$email = isset($_POST['email']) ? trim($_POST['email']) : '';

// Validate input
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Invalid email address.']);
    exit;
}

// Connect to database
$conn = db_connect();

// Check if email already exists
$checkStmt = $conn->prepare("SELECT id FROM subscribers WHERE email = ?");
$checkStmt->bind_param("s", $email);
$checkStmt->execute();
$checkStmt->store_result();

if ($checkStmt->num_rows > 0) {
    echo json_encode(['success' => false, 'message' => 'You are already subscribed.']);
    $checkStmt->close();
    $conn->close();
    exit;
}

$checkStmt->close();

// Prepare and execute SQL
$stmt = $conn->prepare("INSERT INTO subscribers (email) VALUES (?)");
$stmt->bind_param("s", $email);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Subscribed successfully!']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to subscribe. Please try again later.']);
}

$stmt->close();
$conn->close();
?>