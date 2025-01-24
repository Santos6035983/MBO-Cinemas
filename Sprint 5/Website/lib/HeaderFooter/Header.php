<?php
session_start();
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
                    <li><a href="Reserveren.php">Reserveren</a></li>
                    <li><a href="Wenslijst.php">Wenslijst</a></li>
                    <li><a href="Profiel.php">Profiel</a></li>
                    <li><a href="logout.php">Uitloggen</a></li>
                <?php else: ?>
                    <li><a href="lib\Database\Registreer.php">Registreer</a></li>
                    <li><a href="lib\Database\Login.php">Inloggen</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>