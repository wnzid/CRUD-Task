<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $pageTitle ?? 'Eclat Book Management System'; ?></title>
  <link rel="stylesheet" href="styles.css"> 
</head>
<body>
<header>
  <?php if (isset($_SESSION['username'])): ?>
      <p>User online: <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
      <nav>
          <a href="dashboard.php">Dashboard</a> |
          <a href="list.php">Book List</a> |
          <a href="logout.php">Logout</a>
      </nav>
  <?php else: ?>
      <nav>
          <a href="login.php">Login</a> |
          <a href="register.php">Register</a>
      </nav>
  <?php endif; ?>
</header>
<main>
