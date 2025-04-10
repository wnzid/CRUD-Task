<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once __DIR__ . '/../includes/db.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "Invalid request.";
    exit();
}

$id = (int) $_GET['id'];

if ($id === $_SESSION['user_id']) {
    echo "You cannot delete yourself.";
    exit();
}

$stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
if ($stmt->execute([$id])) {
    header("Location: list_users.php");
    exit();
} else {
    echo "Error deleting user.";
}
//done
?>
