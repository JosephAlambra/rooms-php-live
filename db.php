<?php
// Use environment variables for database connection
$host = getenv('DB_HOST');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_NAME');
$port = getenv('DB_PORT') ?: 3306;

// Ensure all required environment variables are set
if (!$host || !$username || !$password || !$database) {
    die("Missing database configuration. Please set all database environment variables.");
}

// Create connection
try {
    $conn = new mysqli($host, $username, $password, $database, $port);

    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
} catch (Exception $e) {
    // Log the error and provide a generic error message
    error_log($e->getMessage());
    die("Database connection error. Please contact support.");
}
?>