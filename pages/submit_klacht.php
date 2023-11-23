<?php
include('../database/connect.php'); // Connect to the database
include('../include/navbar.html'); // Connect to the database
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/klachtindienen.css">
    <link rel="stylesheet" href="../css/homepage.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klacht Indienen</title>
</head>
<body>

<h1>Klacht Indienen</h1>

<form id="klachtForm" action="../extrapunten/store_coordinates.php" method="post" onsubmit="submitForm()">
<form id="klachtForm" action="dashboard.php" method="post" onsubmit="submitForm()">
    <label for="klacht">Klacht:</label>
    <textarea id="klacht" name="klacht" rows="4" cols="50" required></textarea>

    <br>

    <!-- Add hidden input fields for latitude and longitude in the form -->
    <input type="hidden" id="latitude" name="latitude" value="">
    <input type="hidden" id="longitude" name="longitude" value="">

    <button type="submit">Indienen</button>
</form>

</body>
</html>
