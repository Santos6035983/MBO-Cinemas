<?php
require_once 'lib/Database/Database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();
    $db = $database->connect();
    $data = [
        'username' => $_POST['username'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        'email' => $_POST['email'],
        'birthday' => DateTime::createFromFormat('d-m-Y', $_POST['birthday'])->format('Y-m-d')
    ];
    if ($database->create('users', $data)) {
        echo 'User successfully registered.';
    } else {
        echo 'An error occurred while registering the user.';
    }
}
?>

<?php include 'lib/HeaderFooter/Header.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <script src="lib/js/formValidation.js"></script>
</head>
<body>
    <main>
    <form method="POST" action="Registreer.php">
        <label for="username">Gebruikersnaam:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Wachtwoord:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="birthday">Geboortedatum:</label>
        <input type="text" id="birthday" name="birthday" placeholder="dd-mm-jjjj" required>
        <br>
        <button type="submit">Registreer</button>
    </form>
    </main>

    <?php include 'lib/HeaderFooter/Footer.php'; ?>
    
</body>
</html>