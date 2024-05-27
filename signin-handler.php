<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "Barton-324";
$dbname = "valorant_data";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare and bind
$stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

// Check if user exists
if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $username, $hashed_password);
    $stmt->fetch();

    // Verify password
    if (password_verify($password, $hashed_password)) {
        // Start session and store user data
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $username;
        
        // Redirect to index.php
        header("Location: index.php");
        exit;
    } else {
        // Invalid password
        echo "Invalid username or password.";
    }
} else {
    // Invalid username
    echo "Invalid username or password.";
}

$stmt->close();
$conn->close();
?>
