<?php
session_start();
require "database.php"; // contains $server, $username, $password, $database

// 1) Only process when the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // If someone visits login.php directly, redirect to index.html
    header("Location: index.html");
    exit;
}

// 2) Retrieve and sanitize form data
$inputUsername = trim($_POST['username'] ?? '');
$inputPassword = $_POST['password'] ?? '';

if ($inputUsername === '' || $inputPassword === '') {
    echo "Please enter both a username and a password.";
    exit;
}

// 3) Connect to MySQL via PDO
try {
    $dsn = "mysql:host={$server};dbname={$database};charset=utf8mb4";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// 4) Prepare and execute SELECT query
$sql = "SELECT id, username, password FROM loginproject WHERE username = :username LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute([':username' => $inputUsername]);

// 5) Fetch the user row (or false if not found)
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    // No matching username
    echo "Invalid username or password.";
    exit;
}

// 6) Compare passwords (plain-text comparison)
if ($inputPassword === $user['password']) {
    $passwordIsValid = true;
} else {
    $passwordIsValid = false;
}

if (!$passwordIsValid) {
    echo "Invalid username or password.";
    exit;
}

// 7) Successful login: set session and show plain message
$_SESSION['id']       = $user['id'];
$_SESSION['username'] = $user['username'];

echo "Login successful. Welcome, " . htmlspecialchars($user['username']) . "!<br>";
echo "<a href=\"homepage.php\">Go to your Homepage</a>";
exit;
?>
