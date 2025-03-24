<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/plain");

$host = "bzgf4ndakhr5jch691lv-mysql.services.clever-cloud.com";
$dbname = "bzgf4ndakhr5jch691lv";
$username = "u0xcngdlpa9p7jby";
$password = "W4yKKXsdBUsciNBTUqNX"; // replace this!

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo "0";
    exit();
}

$room = 'GV307';

// Get the current schedule and override values for the room
$sql = "SELECT schedule, override FROM room_status WHERE room = '$room' LIMIT 1";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $schedule = $row['schedule'];
    $override = $row['override'];

    // Show debug info for testing in browser
    echo "Schedule: $schedule, Override: $override\n";

    if ($override == 0) {
        echo "Final Output: 0"; // Force OFF
    } elseif ($override == 1) {
        echo "Final Output: 1"; // Force ON
    } else {
        echo "Final Output: $schedule"; // Normal operation
    }
}


$conn->close();
?>
