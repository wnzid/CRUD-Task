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

$stmt = $pdo->prepare("DELETE FROM books WHERE id = ?");
if ($stmt->execute([$id])) {
    header("Location: list.php");
    exit();
} else {
    echo "Error deleting the book.";
}
?>