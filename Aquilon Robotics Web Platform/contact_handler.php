<?php
require_once 'config/database.php';

class ContactHandler {
    private $conn;
    private $table = "contact_messages";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function saveMessage($name, $email, $message) {
        $query = "INSERT INTO " . $this->table . "
                  SET name = :name,
                      email = :email,
                      message = :message";

        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $name = htmlspecialchars(strip_tags($name));
        $email = htmlspecialchars(strip_tags($email));
        $message = htmlspecialchars(strip_tags($message));

        // Validate email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format";
        }

        // Bind parameters
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":message", $message);

        if($stmt->execute()) {
            // Send email notification (optional)
            $this->sendEmailNotification($name, $email, $message);
            return "success";
        }
        return "Database error";
    }

    private function sendEmailNotification($name, $email, $message) {
        $to = "info@aquilon-robotics.com";
        $subject = "New Contact Form Submission from " . $name;
        $headers = "From: " . $email . "\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        $email_body = "
        <html>
        <head>
            <title>New Contact Form Submission</title>
        </head>
        <body>
            <h2>New Contact Form Submission</h2>
            <p><strong>Name:</strong> " . $name . "</p>
            <p><strong>Email:</strong> " . $email . "</p>
            <p><strong>Message:</strong><br>" . nl2br($message) . "</p>
            <p><strong>Submitted:</strong> " . date('Y-m-d H:i:s') . "</p>
        </body>
        </html>
        ";

        mail($to, $subject, $email_body, $headers);
    }
}
?>