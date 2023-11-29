<?php
include('../database/connect.php');
include('../include/navbar.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Wachtwoord wijzigen
    if (isset($_POST['change_password'])) {
        $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);
        $query = "UPDATE users SET password='$new_password' WHERE id=$user_id";
        mysqli_query($conn, $query);
    }
    // E-mail wijzigen
    elseif (isset($_POST['change_email'])) {
        $new_email = $_POST['new_email'];
        $query = "UPDATE users SET email='$new_email' WHERE id=$user_id";
        mysqli_query($conn, $query);
    }
    // Account verwijderen
    elseif (isset($_POST['delete_account'])) {
        $query = "DELETE FROM users WHERE id=$user_id";
        mysqli_query($conn, $query);

        // Optioneel: vernietig de sessie en stuur de gebruiker naar de uitlogpagina
        session_destroy();
        header('Location: logout.php');
        exit;
    }
}

$query = "SELECT * FROM users WHERE id=$user_id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/klachtindienen.css">
    <link rel="stylesheet" href="../css/homepage.css">

    <title>Dashboard</title>
    <style>
        body {
            margin: 20px;
        }
        #welcome {
            float: right;
            font-size: 14px;
        }
    </style>
</head>
<body>
<h1>Mijn account</h1>


<h2>Accountgegevens</h2>
<p>E-mail: <?php echo $user['email']; ?></p>

<h2>Wachtwoord wijzigen</h2>
<form method="post" action="">
    <label for="new_password">Nieuw wachtwoord:</label>
    <input type="password" name="new_password" required><br>
    <button type="submit" name="change_password">Wijzig wachtwoord</button>
</form>

<h2>E-mail wijzigen</h2>
<form method="post" action="">
    <label for="new_email">Nieuw e-mailadres:</label>
    <input type="email" name="new_email" required><br>
    <button type="submit" name="change_email">Wijzig e-mailadres</button>
</form>

<h2>Account verwijderen</h2>
<form method="post" action="">
    <button type="submit" name="delete_account" onclick="return confirm('Weet je zeker dat je je account wilt verwijderen?')">Verwijder account</button>
</form>
</body>
</html>
