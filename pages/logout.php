<?php
session_start();

// Optioneel: Voer hier extra logica uit, bijvoorbeeld het registreren van uitlogactiviteit.

// Vernietig de sessievariabelen
session_unset();
session_destroy();

// Optioneel: Voer hier extra logica uit, bijvoorbeeld het registreren van uitlogactiviteit.

// Stuur de gebruiker naar de inlogpagina
header('Location: login.php');
exit;
?>

<!-- ... Andere inhoud van de dashboardpagina ... -->
<div id="welcome">Welkom, <?php echo $user['email']; ?>! | <a href="logout.php">Uitloggen</a></div>
<!-- ... Andere inhoud van de dashboardpagina ... -->
