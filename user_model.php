<?php
// models/User.php - User Model

class User {
    private $conn;
    private $table_name = "users";

    public $id;
    public $username;
    public $email;
    public $password; // Hashed password

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create a new user
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (username, email, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email = htmlspecialchars(strip_tags($this->email));
        // Hash the password before saving
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);

        $stmt->bind_param("sss", $this->username, $this->email, $this->password);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Find user by username
    public function findByUsername() {
        $query = "SELECT id, username, email, password FROM " . $this->table_name . " WHERE username = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $this->username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row) {
            $this->id = $row['id'];
            $this->username = $row['username'];
            $this->email = $row['email'];
            $this->password = $row['password']; // This is the hashed password
            return true;
        }
        return false;
    }

    // Verify password
    public function verifyPassword($password_input) {
        return password_verify($password_input, $this->password);
    }
}

?>
