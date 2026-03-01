<?php
// api/simple_contact.php - Handle Contact Form Submission

// Set header for JSON response
header('Content-Type: application/json');

// Include config file
require_once '../config.php';  // Adjust path if needed (assuming api/ is a subfolder)

// Get POST data (supports both FormData and JSON)
$input = file_get_contents('php://input');
if (!empty($input) && json_decode($input, true)) {
    // If JSON input
    $data = json_decode($input, true);
    $name = isset($data['name']) ? trim($data['name']) : '';
    $email = isset($data['email']) ? trim($data['email']) : '';
    $subject = isset($data['subject']) ? trim($data['subject']) : '';
    $message = isset($data['message']) ? trim($data['message']) : '';
} else {
    // If FormData
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';
}

// Validate input
if (empty($name) || empty($email) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Invalid input. Please fill all required fields correctly.']);
    exit;
}

// Connect to database
$conn = db_connect();

// Prepare and execute SQL
$stmt = $conn->prepare("INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $subject, $message);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Your message has been sent successfully!']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to send message. Please try again later.']);
}

$stmt->close();
$conn->close();
?>