<?php
session_start();
require_once __DIR__ . '/../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $author = trim($_POST['author']);
    
    $stmt = $pdo->prepare("INSERT INTO book (title, author) VALUES (?, ?)");
    if ($stmt->execute([$title, $author])) {
        header("Location: list.php");
        exit();
    } else {
        echo "Error inserting book record.";
    }
}
?>