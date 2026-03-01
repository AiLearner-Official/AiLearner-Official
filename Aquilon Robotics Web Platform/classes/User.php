<?php
require_once 'config/database.php';

class User {
    private $conn;
    private $table = "users";

    public $id;
    public $username;
    public $email;
    public $password;
    public $full_name;
    public $role;
    public $status;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // User Registration
    public function register() {
        $query = "INSERT INTO " . $this->table . "
                  SET username = :username,
                      email = :email,
                      password = :password,
                      full_name = :full_name,
                      role = 'user',
                      status = 'active'";

        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->full_name = htmlspecialchars(strip_tags($this->full_name));

        // Hash password
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);

        // Bind parameters
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":full_name", $this->full_name);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // User Login
    public function login() {
        $query = "SELECT id, username, email, password, full_name, role, status 
                  FROM " . $this->table . " 
                  WHERE username = :username OR email = :email 
                  LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Verify password
            if(password_verify($this->password, $row['password'])) {
                // Check if user is active
                if($row['status'] == 'active') {
                    // Update last login
                    $this->updateLastLogin($row['id']);
                    
                    // Set user data
                    $this->id = $row['id'];
                    $this->username = $row['username'];
                    $this->email = $row['email'];
                    $this->full_name = $row['full_name'];
                    $this->role = $row['role'];
                    $this->status = $row['status'];
                    
                    return true;
                }
            }
        }
        return false;
    }

    // Check if username/email exists
    public function userExists() {
        $query = "SELECT id FROM " . $this->table . " 
                  WHERE username = :username OR email = :email 
                  LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    // Update last login time
    private function updateLastLogin($user_id) {
        $query = "UPDATE " . $this->table . " 
                  SET last_login = NOW() 
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $user_id);
        $stmt->execute();
    }

    // Get user by ID
    public function getUserById($id) {
        $query = "SELECT id, username, email, full_name, role, status, created_at 
                  FROM " . $this->table . " 
                  WHERE id = :id 
                  LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update user profile
    public function updateProfile() {
        $query = "UPDATE " . $this->table . " 
                  SET full_name = :full_name,
                      email = :email,
                      updated_at = NOW()
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":full_name", $this->full_name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    // Change password
    public function changePassword($new_password) {
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
        
        $query = "UPDATE " . $this->table . " 
                  SET password = :password,
                      updated_at = NOW()
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":password", $hashed_password);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }
}
?>