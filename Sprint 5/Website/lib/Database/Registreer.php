<?php

include 'lib\HeaderFooter\Header.php';

session_start();
require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();
    $db = $database->connect();

    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];

    $date = DateTime::createFromFormat('d-m-Y', $birthday);
    if (!$date || $date->format('d-m-Y') !== $birthday) {
        echo 'Invalid date format';
        exit();
    }
    $birthday = $date->format('Y-m-d');

    $query = 'INSERT INTO users (username, password, email, birthday) VALUES (:username, :password, :email, :birthday)';
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':birthday', $birthday);

    if ($stmt->execute()) {
        $_SESSION['user_id'] = $db->lastInsertId();
        header('Location: Home.php');
        exit();
    } else {
        echo 'Error registering user';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <main>
    <form method="POST" action="register.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="birthday">Birthday:</label>
        <input type="text" id="birthday" name="birthday" placeholder="dd-mm-jjjj" required>
        <br>
        <button type="submit">Register</button>
    </form>

</main>

    <?php include 'lib\HeaderFooter\Footer.php'; ?>
    
</body>
</html>