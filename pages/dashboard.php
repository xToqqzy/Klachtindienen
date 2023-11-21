<?php
include('../database/connect.php'); // Connect to the database
include('../include/navbar.html'); // Connect to the database
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="../css/navbar.css">
<link rel="stylesheet" href="../css/klachtindienen.css">
<link rel="stylesheet" href="../css/homepage.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints Dashboard</title>
</head>
<body>

<h1>Complaints Dashboard</h1>

<div id="map" style="height: 500px;"></div>

<script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 0, lng: 0},
            zoom: 2
        });

        // Fetch complaints data from the server
        fetch('get_complaints.php')
            .then(response => response.json())
            .then(data => {
                // Loop through the complaints and add markers to the map
                data.forEach(complaint => {
                    var marker = new google.maps.Marker({
                        position: {lat: parseFloat(complaint.latitude), lng: parseFloat(complaint.longitude)},
                        map: map,
                        title: 'Complaint Location'
                    });
                });
            })
            .catch(error => console.error('Error fetching complaints:', error));
    }
</script>

<!-- Include the Google Maps API script (replace YOUR_API_KEY with your actual API key) -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>

</body>
</html>
