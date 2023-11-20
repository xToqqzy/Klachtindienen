<?php
include('../database/connect.php'); // Connect to the database
include('../include/navbar.html'); // Connect to the database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receive the complaint from the form
    $klacht = $_POST['klacht'];

    // Add the complaint to the database
    $sql = "INSERT INTO klachten (klacht) VALUES ('$klacht')";
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

<!DOCTYPE html>

<html lang="en">
<link rel="stylesheet" href="../css/klachtindienen.css">
<link rel="stylesheet" href="../css/navbar.css">
<link rel="stylesheet" href="../css/homepage.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klacht Indienen</title>
</head>
<body>

<h1>Klacht Indienen</h1>

<form action="#" method="post">
    <label for="klacht">Schrijf hier uw klacht:</label>
    <textarea id="klacht" name="klacht" rows="4" cols="50" required></textarea>

    <br>

    <button type="submit">Indienen</button>
</form>

</body>
</html>
