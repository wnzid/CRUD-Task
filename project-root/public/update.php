<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once __DIR__ . '/../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['id'], $_POST['title'], $_POST['author'])) {
        echo "Missing required fields.";
        exit();
    }
    
    $id = (int) $_POST['id'];
    $title = trim($_POST['title']);
    $author = trim($_POST['author']);

    $stmt = $pdo->prepare("UPDATE books SET title = ?, author = ? WHERE id = ?");
    if ($stmt->execute([$title, $author, $id])) {
        header("Location: list.php");
        exit();
    } else {
        echo "Error updating the book.";
    }
} else {
    header("Location: list.php");
    exit();
}
?>