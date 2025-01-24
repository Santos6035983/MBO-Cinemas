<?php 
include 'lib\HeaderFooter\Header.php'; 
require_once 'lib/Database/Database.php';

$database = new Database();
$db = $database->connect();
$user = $database->read('users', ['id' => $_SESSION['user_id']])[0];
?>

<main>
    <h2>Profiel</h2>
    <p>Welkom, <?php echo htmlspecialchars($user['username']); ?>!</p>
    <p>Uw profielgegevens:</p>
    <ul>
        <li>Gebruikersnaam: <?php echo htmlspecialchars($user['username']); ?></li>
        <li>E-mail: <?php echo htmlspecialchars($user['email']); ?></li>
    </ul>
    <a href="ProfielBewerken.php">Profiel Bewerken</a>
    <a href="Logout.php">Uitloggen</a>
</main>

<?php include 'lib\HeaderFooter\Footer.php'; ?>

</body>
</html>