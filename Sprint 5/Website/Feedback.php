<?php
include 'lib\HeaderFooter\Header.php';
require_once 'lib/Database/Database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();
    $db = $database->connect();

    $user_id = $_SESSION['user_id'];
    $movie = $_POST['movie'];
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];

    $query = 'INSERT INTO feedback (user_id, movie, rating, comments) VALUES (:user_id, :movie, :rating, :comments)';
    $stmt = $db->prepare($query);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':movie', $movie);
    $stmt->bindParam(':rating', $rating);
    $stmt->bindParam(':comments', $comments);

    if ($stmt->execute()) {
        echo 'Feedback successfully submitted.';
    } else {
        echo 'An error occurred while submitting your feedback.';
    }
}
?>

<main>
    <h2>Feedback</h2>
    <form action="Feedback.php" method="post">
        <label for="movie">Film:</label>
        <select id="movie" name="movie" required>
            <option value="Indiana Jones and the Dial of Destiny">Indiana Jones and the Dial of Destiny</option>
            <option value="No Time To Die">No Time To Die</option>
            <option value="Oppenheimer">Oppenheimer</option>
            <option value="El Camino">El Camino</option>
            <option value="Terrifier 3">Terrifier 3</option>
            <option value="Hitman: Agent 47">Hitman: Agent 47</option>
            <option value="Plop en de Kabouterschat">Plop en de Kabouterschat</option>
        </select><br><br>
        
        <label for="rating">Beoordeling:</label>
        <select id="rating" name="rating" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br><br>
        
        <label for="comments">Opmerkingen:</label><br>
        <textarea id="comments" name="comments" rows="4" cols="50"></textarea><br><br>
        
        <input type="submit" value="Verstuur Feedback">
    </form>

    <h3>Alle Feedback</h3>
    <?php
    $database = new Database();
    $db = $database->connect();

    $query = 'SELECT users.username, feedback.movie, feedback.rating, feedback.comments, feedback.created_at 
              FROM feedback 
              JOIN users ON feedback.user_id = users.id 
              ORDER BY feedback.created_at DESC';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $feedbacks = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($feedbacks as $feedback) {
        echo '<div class="feedback">';
        echo '<h4>' . htmlspecialchars($feedback['movie']) . ' - Beoordeling: ' . htmlspecialchars($feedback['rating']) . '/5</h4>';
        echo '<p>' . htmlspecialchars($feedback['comments']) . '</p>';
        echo '<p><small>Door: ' . htmlspecialchars($feedback['username']) . ' op ' . htmlspecialchars($feedback['created_at']) . '</small></p>';
        echo '</div>';
    }
    ?>
</main>

<?php include 'lib\HeaderFooter\Footer.php'; ?>