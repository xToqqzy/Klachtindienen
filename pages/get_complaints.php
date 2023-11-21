<?php
include('../database/connect.php'); // Connect to the database

// Fetch complaints data from the database
$sql = "SELECT * FROM klachten";
$result = $conn->query($sql);

if ($result) {
    $complaints = array();
    while ($row = $result->fetch_assoc()) {
        $complaints[] = $row;
    }

    // Return JSON-encoded data
    header('Content-Type: application/json');
    echo json_encode($complaints);
} else {
    echo "Error fetching complaints: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
