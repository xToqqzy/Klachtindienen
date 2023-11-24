<?php
include('../database/connect.php'); //  database connection
include('../include/navbar.php'); //  nav bar

// haal de info uit de database
$query = "SELECT latitude, longitude, location_name FROM klachten"; // Vervang 'your_table_name' met de daadwerkelijke naam van je tabel
$result = mysqli_query($conn, $query);

//  een lege array om de locaties op te slaan
$locations = [];

while ($row = mysqli_fetch_assoc($result)) {
    $locations[] = [
        'lat' => $row['latitude'],
        'lon' => $row['longitude'],
        'name' => $row['location_name'],
    ];
}
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
    var map = L.map('map').setView([51.9225, 4.47917], 12); // De coördinaten hier zijn voor roffa.


    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

   // hier haalt die de gegevens uit
    var locations = <?php echo json_encode($locations); ?>;

    locations.forEach(function(location) {
        var marker = L.marker([location.lat, location.lon]).addTo(map);
        marker.bindPopup(location.name);
    });
</script>

</body>
</html>
