<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Retrieve the user by username
    $stmt = $pdo->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // Verify password
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: dashboard.php");
        exit;
    } else {
        header("Location: login.php?error=" . urlencode("Invalid credentials."));
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}
?>