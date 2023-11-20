<?php
$servername = "localhost";
$username = "root"; // Change this if your XAMPP username is different
$password = ""; // Change this if your XAMPP password is different
$dbname = "klachtindienen";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
