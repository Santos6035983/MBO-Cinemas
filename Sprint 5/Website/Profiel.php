<?php include 'lib\HeaderFooter\Header.php'; ?>

<main>
    <h2>Profiel</h2>
    <p>Welkom, <?php echo $_SESSION['username']; ?>!</p>
    <p>Uw profielgegevens:</p>
    <ul>
        <li>Gebruikersnaam: <?php echo $_SESSION['username']; ?></li>
        <li>E-mail: <?php echo $_SESSION['email']; ?></li>
    </ul>
    <a href="Logout.php">Uitloggen</a>
</main>

<?php include 'lib\HeaderFooter\Footer.php'; ?>

</body>
</html>