<?php
include 'lib\HeaderFooter\Header.php';
require_once 'lib/Database/Database.php';

$user_id = $_SESSION['user_id'];

$database = new Database();
$conn = $database->connect();
?>

<main>
    <h2>Wenslijst</h2>
    <p>Voeg films toe aan uw wenslijst om ze later te reserveren.</p>
    <form action="" method="post">
        <label for="film">Film:</label>
        <select id="film" name="film" required>
            <option value="Indiana Jones and the Dial of Destiny">Indiana Jones and the Dial of Destiny</option>
            <option value="No Time To Die">No Time To Die</option>
            <option value="Oppenheimer">Oppenheimer</option>
            <option value="El Camino">El Camino</option>
            <option value="Terrifier 3">Terrifier 3</option>
            <option value="Hitman: Agent 47">Hitman: Agent 47</option>
            <option value="Plop en de Kabouterschat">Plop en de Kabouterschat</option>
        </select>

        <button type="submit">Voeg toe</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $film = $_POST['film'];
        $stmt = $conn->prepare("INSERT INTO wenslijst (user_id, film) VALUES (?, ?) ON DUPLICATE KEY UPDATE film=film");
        $stmt->bindParam(1, $user_id, PDO::PARAM_INT);
        $stmt->bindParam(2, $film, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
    }

    $stmt = $conn->prepare("SELECT film FROM wenslijst WHERE user_id = ?");
    $stmt->bindParam(1, $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $wenslijst = [];
    foreach ($result as $row) {
        $wenslijst[] = $row['film'];
    }
    $stmt->closeCursor();
    ?>

    <h3>Wenslijst</h3>
    <ul>
        <?php foreach ($wenslijst as $film): ?>
            <li><?php echo htmlspecialchars($film); ?></li>
        <?php endforeach; ?>
    </ul>
</main>

<?php
$conn = null;
include 'lib\HeaderFooter\Footer.php';
?>