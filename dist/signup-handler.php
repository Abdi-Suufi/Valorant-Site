<?php
// Start the session
session_start();

include('database.php');

// Process sign up form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if username or email already exists
    $checkQuery = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Username or email already exists
        $_SESSION['signup_error'] = "Username or email already taken. Please try another.";
        header("Location: signup.php");
        exit();
    } else {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and bind the SQL statement
        $insertQuery = "INSERT INTO users (username, email, password, score) VALUES (?, ?, ?, 0)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("sss", $username, $email, $hashed_password);

        // Execute the statement
        if ($stmt->execute()) {
            // Get the last inserted ID (the new user's ID)
            $userId = $conn->insert_id;

            // Set session variables with username and user_id
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $userId; 

            // Redirect back to index.php
            header("Location: index.php");
            exit();
        } else {
            $_SESSION['signup_error'] = "Error: " . $stmt->error;
            header("Location: signup.php");
            exit();
        }
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}
?>