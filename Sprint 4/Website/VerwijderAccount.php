<?php 
include 'lib\HeaderFooter\Header.php'; 
require_once 'lib/Database/Database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();
    $db = $database->connect();
    $conditions = ['id' => $_SESSION['user_id']];
    if ($database->delete('users', $conditions)) {
        session_destroy();
        echo 'Account successfully deleted.';
    } else {
        echo 'An error occurred while deleting the account.';
    }
}
?>

<main>
    <h2>Account Verwijderen</h2>
    <form method="POST">
        <p>Weet u zeker dat u uw account wilt verwijderen? Dit kan niet ongedaan worden gemaakt.</p>
        <button type="submit">Verwijder Account</button>
    </form>
    <a href="Profiel.php">Terug naar Profiel</a>
</main>

<?php include 'lib\HeaderFooter\Footer.php'; ?>

</body>
</html>
