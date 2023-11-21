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
    <label for="klacht">Klacht:</label>
    <textarea id="klacht" name="klacht" rows="4" cols="50" required></textarea>

    <br>

    <!-- Add hidden input fields for latitude and longitude in the form -->
    <input type="hidden" id="latitude" name="latitude" value="">
    <input type="hidden" id="longitude" name="longitude" value="">

    <button type="submit">Indienen</button>
</form>

<div id="map" style="height: 500px;"></div>

<script>
    function submitForm() {
        // Get the GPS coordinates
        navigator.geolocation.getCurrentPosition(function(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

            // Set the values of the hidden fields
            document.getElementById('latitude').value = latitude;
            document.getElementById('longitude').value = longitude;

            // Log the GPS coordinates
            console.log('Latitude: ' + latitude + ', Longitude: ' + longitude);

            // Display the coordinates on the map
            displayMap(latitude, longitude);
        });

        // Prevent the form from submitting in this example
        return false;
    }

    function displayMap(latitude, longitude) {
        // Display the map using Google Maps API
        var mapDiv = document.getElementById('map');
        mapDiv.innerHTML = ''; // Clear previous map

        var map = new google.maps.Map(mapDiv, {
            center: {lat: latitude, lng: longitude},
            zoom: 15
        });

        var marker = new google.maps.Marker({
            position: {lat: latitude, lng: longitude},
            map: map,
            title: 'Complaint Location'
        });
    }
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

            // Redirect to the dashboard after submission
            header('Location: dashboard.php');
            exit();
        } else {
            echo "An error occurred while submitting the complaint.";
        }
    }

    // Close the database connection
    $conn->close();
    ?>

</script>

<!-- Include the Google Maps API script (replace YOUR_API_KEY with your actual API key) -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>

<!-- Include a separate script for map initialization -->
<script>
    var map;

    function initMap() {
        // Create a map centered at (0, 0) (change the center as needed)
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 0, lng: 0},
            zoom: 2
        });
    }
</script>

</body>
</html>
