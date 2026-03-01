<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Set headers for JSON response
header('Content-Type: application/json');

// Allow CORS (for testing)
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Initialize response
$response = [
    'success' => false,
    'message' => '',
    'data' => []
];

// Get the raw POST data
$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

// If JSON decode fails, try regular POST
if (json_last_error() !== JSON_ERROR_NONE) {
    $data = $_POST;
}

// Log received data (for debugging)
file_put_contents('debug.log', print_r($data, true), FILE_APPEND);

// Validate required fields
if (empty($data['name']) || empty($data['email']) || empty($data['interest'])) {
    $response['message'] = 'All fields are required';
    echo json_encode($response);
    exit();
}

// Sanitize inputs
$name = trim($data['name']);
$email = trim($data['email']);
$interest = trim($data['interest']);

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $response['message'] = 'Invalid email format';
    echo json_encode($response);
    exit();
}

// Database connection - XAMPP settings
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'skiller_db';

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    $response['message'] = 'Database connection failed: ' . $conn->connect_error;
    echo json_encode($response);
    exit();
}

// Get additional info
$ip_address = $_SERVER['REMOTE_ADDR'] ?? 'Unknown';
$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
$current_time = date('Y-m-d H:i:s');

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO subscribers (name, email, interest, ip_address, user_agent, subscription_date) VALUES (?, ?, ?, ?, ?, ?)");
if (!$stmt) {
    $response['message'] = 'Prepare statement error: ' . $conn->error;
    echo json_encode($response);
    $conn->close();
    exit();
}

$stmt->bind_param("ssssss", $name, $email, $interest, $ip_address, $user_agent, $current_time);

// Execute the statement
if ($stmt->execute()) {
    $response['success'] = true;
    $response['message'] = 'Thank you for subscribing! Check your email for the free programming guide.';
    $response['data'] = [
        'id' => $stmt->insert_id,
        'name' => $name,
        'email' => $email,
        'interest' => $interest,
        'timestamp' => $current_time
    ];
} else {
    // Check if it's a duplicate email error
    if ($conn->errno == 1062) { // MySQL duplicate entry error code
        $response['message'] = 'This email is already subscribed!';
    } else {
        $response['message'] = 'Error saving subscription: ' . $stmt->error;
    }
}

// Close connections
$stmt->close();
$conn->close();

// Return JSON response
echo json_encode($response);
?>