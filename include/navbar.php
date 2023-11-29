<?php
include('../database/connect.php'); // Connect to the database
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM users WHERE id=$user_id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/navbar.css">
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div class="logo">
    <img src="../image/Gemeente-Rotterdam-logo.png" alt="Logo">
</div>

<div class="navbar">
    <nav>
        <a href="../pages/dashboard.php">Dashboard</a>
        <a href="../pages/submit_klacht.php">Klacht Indienen</a>
        <a href="../pages/login.php">inloggen</a>
        <a href="../pages/register.php">register</a>
        <a href="../pages/accountdashboard.php">mijn account</a>
    </nav>
    <div id="welcome">Welkom, <?php echo $user['email']; ?>! | <a href="../pages/logout.php">Uitloggen</a></div>
<style>
    #welcome{
        color: #ff0101;
    }
</style>

</div>

</body>
</html>



