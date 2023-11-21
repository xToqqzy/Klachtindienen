function submitForm() {
    // Get the complaint from the form
    var klacht = document.getElementById('klacht').value;

    // Get the GPS coordinates
    navigator.geolocation.getCurrentPosition(function(position) {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;

        // Set the values of the hidden fields
        document.getElementById('latitude').value = latitude;
        document.getElementById('longitude').value = longitude;

        // Log the GPS coordinates and send them to the server
        console.log('Latitude: ' + latitude + ', Longitude: ' + longitude);

        // Now, you can proceed to submit the form data to the server, including GPS coordinates
        // For simplicity, I'm just logging the complaint here
        console.log('Complaint: ' + klacht);

        // You should also send the coordinates to the server using AJAX or a form submission
        // For example, using fetch() or jQuery.ajax()
    });

    // Prevent the form from submitting in this example
    return false;
}
