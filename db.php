<?php
$servername = "bzgf4ndakhr5jch691lv-mysql.services.clever-cloud.com";
$port = 3306;
$username = "u0xcngdlpa9p7jby";
$password = "W4yKKXsdBUsciNBTUqNX"; // replace this!
$dbname = "bzgf4ndakhr5jch691lv";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
