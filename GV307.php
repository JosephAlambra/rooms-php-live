<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/plain");

include 'db.php';

$room = 'GV307';

// Get the current schedule and override values for the room
$sql = "SELECT schedule, override FROM room_status WHERE room = '$room' LIMIT 1";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $schedule = $row['schedule'];
    $override = $row['override'];

    if ($override == 0) {
        echo "0"; // Force OFF
    } elseif ($override == 1) {
        echo "1"; // Force ON
    } else {
        echo $schedule; // Normal operation
    }
}


$conn->close();
?>
