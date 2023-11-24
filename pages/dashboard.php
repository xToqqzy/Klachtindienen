<?php
include('../database/connect.php'); // Connect to the database
include('../include/navbar.php'); // Connect to the database
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>
<body>

<h1>Klachten omgeving gemeente Rotterdam:</h1>

<div id="map" style="height: 400px;"></div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    // Hier voeg je JavaScript toe om de map en markers weer te geven.

    // Initieer de kaart op een bepaald element met een specifieke locatie en zoomniveau.
    var map = L.map('map').setView([51.9225, 4.47917], 12); // De coördinaten hier zijn voor Rotterdam.

    // Voeg de OpenStreetMap-laag toe aan de kaart.
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Hier zou je een AJAX-verzoek kunnen doen om de locatiegegevens op te halen.
    // Vervang dit met de daadwerkelijke gegevens die je van de server hebt ontvangen.
    var locations = [
        { lat: 51.9225, lon: 4.47917, name: "Marker 1" },
        { lat: 51.9125, lon: 4.46917, name: "Marker 2" },
        { lat: 51.9125, lon: 4.56977, name: "Marker 3" },
        // Voeg meer locaties toe zoals nodig
    ];

    // Itereer over de locaties en voeg markers toe aan de kaart.
    locations.forEach(function(location) {
        var marker = L.marker([location.lat, location.lon]).addTo(map);
        marker.bindPopup(location.name);
    });
</script>

</body>
</html>
