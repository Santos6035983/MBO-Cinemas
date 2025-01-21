<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keywords" content="">
        <title>Contact - MBO Cinemas</title>
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
            </ul>
        </nav>
    </header>
    <main>
        <h2>Contact</h2>
        <p>Neem contact met ons op via het onderstaande formulier of via de contactgegevens.</p>
        <form action="submit_contact.php" method="post">
            <label for="name">Naam:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="message">Bericht:</label>
            <textarea id="message" name="message" rows="4" required></textarea>
            
            <button type="submit">Verstuur</button>
        </form>
        <section>
            <h3>Onze gegevens</h3>
            <p>Adres: Bioscoopstraat 123, 1234 AB, Filmstad</p>
            <p>Telefoon: 012-3456789</p>
            <p>E-mail: info@mbocinemas.nl</p>
        </section>
    </main>
    <footer>
        <p>© 2024 MBO Cinemas. Alle rechten voorbehouden.</p>
    </footer>
</body>
</html>