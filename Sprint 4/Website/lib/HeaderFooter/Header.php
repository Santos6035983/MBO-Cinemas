<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!doctype html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <title>Home - MBO Cinemas</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <header>
        <h1>MBO Cinemas</h1>
        <nav>
            <ul>
                <li><a href="Home.php">Home</a></li>
                <li><a href="Films.php">Films</a></li>
                <li><a href="Contact.php">Contact</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="Feedback.php">Feedback</a></li>
                    <li><a href="Reserveren.php">Reserveren</a></li>
                    <li><a href="Wenslijst.php">Wenslijst</a></li>
                    <li><a href="Profiel.php">Profiel</a></li>
                    <li><a href="Logout.php">Uitloggen</a></li>
                <?php else: ?>
                    <li><a href="Registreer.php">Registreer</a></li>
                    <li><a href="Login.php">Inloggen</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
</body>

</html>