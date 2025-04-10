<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
require_once __DIR__ . '/../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['id'], $_POST['username'])) {
        echo "Missing required fields.";
        exit();
    }
    
    $id = (int) $_POST['id'];
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    
    if (!empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE users SET username = ?, password = ? WHERE id = ?");
        $result = $stmt->execute([$username, $hashedPassword, $id]);
    } else {
        $stmt = $pdo->prepare("UPDATE users SET username = ? WHERE id = ?");
        $result = $stmt->execute([$username, $id]);
    }
    
    if ($result) {
        header("Location: list_users.php");
        exit();
    } else {
        echo "Error updating user.";
    }
} else {
    header("Location: list_users.php");
    exit();
}
//done
?>
