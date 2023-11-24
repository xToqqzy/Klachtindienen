<?php
include('../database/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verwerk de klachtgegevens
    $klacht = $_POST['klacht'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    // Voeg de klacht en locatiegegevens toe aan de database
    $query = "INSERT INTO klachten (klacht, latitude, longitude) VALUES ('$klacht', '$latitude', '$longitude')";
    mysqli_query($conn, $query);

    // Stuur een succesvol antwoord terug (kan worden aangepast op basis van je behoeften)
    echo json_encode(['status' => 'success']);
} else {
    // Stuur een foutantwoord terug als het geen POST-verzoek is
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>



<?php
include('../database/connect.php'); // Connect to the database
include('../include/navbar.php'); // Connect to the database
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

<script>
    // Functie om de locatie van de gebruiker op te halen en deze in de hidden inputs te plaatsen
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                console.log(latitude)
                console.log(longitude)
                document.getElementById("latitude").value = latitude;
                document.getElementById("longitude").value = longitude;

                // Plaats de longitudinaal en latitudinaal in de hidden inputs
                $('#latitude').val(latitude);
                $('#longitude').val(longitude);
            }, function(error) {
                console.error('Fout bij het ophalen van locatie:', error.message);
            });
        } else {
            console.error('Geolocatie wordt niet ondersteund in deze browser.');
        }
    }

    getLocation();
</script>


