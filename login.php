<?php
session_start();
require "database.php"; // contains $server, $username, $password, $database

try {
    $pdo = new PDO("mysql:host=$server;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$inputUsername = $_POST['username'];
$inputPassword = $_POST['password'];

$stmt = $pdo->prepare("SELECT * FROM loginproject WHERE username = ?");
$stmt->execute([$inputUsername]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && $inputPassword === $user['password']) {

    $_SESSION['id'] = $user['id'];
    echo "✅ Login successful. Welcome, " . htmlspecialchars($user['username']) . "!<br>";
echo "👉 <a href='homepage.php'>Go to your Homepage</a>";

} else {
    echo "❌ Invalid username or password.";
}
?>


