<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
require_once __DIR__ . '/../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    if(empty($username) || empty($password)){
        echo "All fields are required.";
        exit;
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    if ($stmt->execute([$username, $hashedPassword])) {
        header("Location: list_users.php");
        exit;
    } else {
        echo "An error occurred while adding the user.";
    }
} else {
    header("Location: add_user.php");
    exit;
}
?>
<!--done-->