<?php
class Session {
    private $db;
    private $table = "user_sessions";

    public function __construct($db) {
        $this->conn = $db;
        session_start();
    }

    // Create session
    public function createSession($user_id, $remember = false) {
        $token = bin2hex(random_bytes(32));
        $expires = $remember ? date('Y-m-d H:i:s', strtotime('+30 days')) : date('Y-m-d H:i:s', strtotime('+2 hours'));
        
        $query = "INSERT INTO " . $this->table . "
                  SET user_id = :user_id,
                      session_token = :token,
                      ip_address = :ip,
                      user_agent = :agent,
                      expires_at = :expires";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":token", $token);
        $stmt->bindParam(":ip", $_SERVER['REMOTE_ADDR']);
        $stmt->bindParam(":agent", $_SERVER['HTTP_USER_AGENT']);
        $stmt->bindParam(":expires", $expires);

        if($stmt->execute()) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['session_token'] = $token;
            
            if($remember) {
                setcookie('remember_token', $token, time() + (30 * 24 * 60 * 60), '/');
            }
            
            return true;
        }
        return false;
    }

    // Validate session
    public function validateSession() {
        if(isset($_SESSION['user_id']) && isset($_SESSION['session_token'])) {
            $query = "SELECT * FROM " . $this->table . " 
                      WHERE user_id = :user_id 
                      AND session_token = :token 
                      AND expires_at > NOW()
                      LIMIT 1";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":user_id", $_SESSION['user_id']);
            $stmt->bindParam(":token", $_SESSION['session_token']);
            $stmt->execute();

            return $stmt->rowCount() > 0;
        }
        
        // Check remember me cookie
        if(isset($_COOKIE['remember_token'])) {
            return $this->validateRememberToken($_COOKIE['remember_token']);
        }
        
        return false;
    }

    // Destroy session
    public function destroySession() {
        if(isset($_SESSION['session_token'])) {
            $query = "DELETE FROM " . $this->table . " 
                      WHERE session_token = :token";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":token", $_SESSION['session_token']);
            $stmt->execute();
        }
        
        session_unset();
        session_destroy();
        setcookie('remember_token', '', time() - 3600, '/');
    }

    // Get current user ID
    public function getUserId() {
        return $_SESSION['user_id'] ?? null;
    }

    private function validateRememberToken($token) {
        $query = "SELECT user_id FROM " . $this->table . " 
                  WHERE session_token = :token 
                  AND expires_at > NOW()
                  LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":token", $token);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['session_token'] = $token;
            return true;
        }
        
        return false;
    }
}
?>