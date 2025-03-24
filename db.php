<?php
// Detailed error logging for database connection
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Use environment variables for database connection
$host = getenv('DB_HOST');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_NAME');
$port = getenv('DB_PORT') ?: 3306;

// Log environment variables for debugging
error_log("Attempting to connect to:");
error_log("Host: $host");
error_log("Username: $username");
error_log("Database: $database");
error_log("Port: $port");

// Try to resolve hostname
$resolved_ip = gethostbyname($host);
error_log("Resolved IP: $resolved_ip");

// Create connection
try {
    // Standard connection with increased timeout
    $conn = new mysqli($host, $username, $password, $database, $port);
    
    // Set connection timeout manually
    $conn->options(MYSQLI_OPT_CONNECT_TIMEOUT, 10);

    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
    
    echo "Successfully connected to the database!";
} catch (Exception $e) {
    // Log detailed error
    error_log("Database Connection Error: " . $e->getMessage());
    die("Detailed connection error: " . $e->getMessage());
}
?>