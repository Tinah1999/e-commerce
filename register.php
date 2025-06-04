<?php
include 'connect_db.php'; // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {

/*    if (isset($_POST['username'])) {
      $username = $_POST['username'];
        // Process the username
    } else {
        echo "Username is required.";
    }
} else {
    echo "Form not submitted.";*/


    // Get the form data
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confrim_password = $_POST['confrim_password'];

    // Check if passwords match
    if ($password !== $confrim_password) {
        echo "Passwords do not match.";
        exit();
    }

    // Hash the password (using password_hash for security)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $hashed_password, $email);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Registration successful! ";
        header("Location: index.php"); // Redirect to the dashboard
        exit();
    } else {
        if ($stmt->errno === 1062) {
            echo "Username already exists. Please choose a different username.";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
