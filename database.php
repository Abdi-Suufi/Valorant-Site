<?php
// Database connection parameters
$host = 'localhost';
$username = 'root';
$password = 'Barton-324';
$database = 'valorant_data';

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
