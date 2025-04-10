<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require_once __DIR__ . '/../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST['title']);
    $author = trim($_POST['author']);

    if (empty($title) || empty($author)) {
        echo "Please fill in all required fields.";
        exit;
    }

    $stmt = $pdo->prepare("INSERT INTO book (title, author) VALUES (?, ?)");
    if ($stmt->execute([$title, $author])) {
        header("Location: list.php");
        exit;
    } else {
        echo "An error occurred while adding the book.";
    }
} else {
    header("Location: add_book.php");
    exit;
}
?>
<!--done-->