<?php
include('../database/connect.php'); // Connect to the database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receive the complaint and coordinates from the form
    $klacht = $_POST['klacht'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    // Add the complaint and coordinates to the database
    $sql = "INSERT INTO klachten (klacht, latitude, longitude, submission_timestamp) VALUES ('$klacht', '$latitude', '$longitude', NOW())";
    $result = $conn->query($sql);

    if ($result) {
        echo "Complaint submitted successfully!";
    } else {
        echo "An error occurred while submitting the complaint.";
    }
}

// Close the database connection
$conn->close();
?>
