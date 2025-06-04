<?php
// controllers/AuthController.php - Authentication Controller

class AuthController {
    public static function login($username, $password) {
        global $conn; // Access the global database connection

        $user = new User($conn);
        $user->username = $username;

        if ($user->findByUsername()) {
            if ($user->verifyPassword($password)) {
                // Login successful
                $_SESSION['user_id'] = $user->id;
                $_SESSION['username'] = $user->username;
                header("Location: /home"); // Redirect to home or dashboard
                exit();
            } else {
                // Invalid password
                $_SESSION['error_message'] = "Invalid username or password.";
                header("Location: /login");
                exit();
            }
        } else {
            // User not found
            $_SESSION['error_message'] = "Invalid username or password.";
            header("Location: /login");
            exit();
        }
    }

    public static function register($username, $password, $email) {
        global $conn; // Access the global database connection

        $user = new User($conn);
        $user->username = $username;
        $user->email = $email;
        $user->password = $password; // This will be hashed in the model

        if ($user->create()) {
            $_SESSION['success_message'] = "Registration successful! Please log in.";
            header("Location: /login");
            exit();
        } else {
            $_SESSION['error_message'] = "Registration failed. Username or email might already exist.";
            header("Location: /register");
            exit();
        }
    }

    public static function logout() {
        session_unset(); // Unset all session variables
        session_destroy(); // Destroy the session
        header("Location: /home"); // Redirect to home page
        exit();
    }

    public static function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    public static function getCurrentUserId() {
        return $_SESSION['user_id'] ?? null;
    }
}

?>
