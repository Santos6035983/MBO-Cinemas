<?php 
include 'lib\HeaderFooter\Header.php'; 
require_once 'lib/Database/Database.php';

$database = new Database();
$db = $database->connect();
$user = $database->read('users', ['id' => $_SESSION['user_id']])[0];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = ['email' => $_POST['email']];
    $conditions = ['id' => $_SESSION['user_id']];
    if ($database->update('users', $data, $conditions)) {
        echo 'Profile successfully updated.';
        $user['email'] = $_POST['email'];
    } else {
        echo 'An error occurred while updating the profile.';
    }
}
?>

<main>
    <h2>Profiel Bewerken</h2>
    <form method="POST">
        <label for="email">Nieuwe e-mail:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        <button type="submit">Update</button>
    </form>
    <a href="Profiel.php">Terug naar Profiel</a>
    <a href="VerwijderAccount.php">Verwijder Account</a>
</main>

<?php include 'lib\HeaderFooter\Footer.php'; ?>

</body>
</html>
