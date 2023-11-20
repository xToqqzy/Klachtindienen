<?php
include('connect.php'); // Connect to the database

// Determine the date from one month ago
$oneMonthAgo = date('Y-m-d H:i:s', strtotime('-1 month'));

// Delete complaints older than one month
$sql = "DELETE FROM klachten WHERE datum_indiening < '$oneMonthAgo'";
$result = $conn->query($sql);

if ($result) {
    echo "Old complaints successfully deleted.";
} else {
    echo "An error occurred while deleting old complaints.";
}

// Close the database connection
$conn->close();
?>
