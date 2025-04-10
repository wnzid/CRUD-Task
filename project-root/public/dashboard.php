<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
$pageTitle = "Dashboard";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $pageTitle; ?></title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background: #f3f3f3;
      color: #333;
    }
    header {
      background: #4CAF50;
      color: #fff;
      padding: 20px;
      text-align: center;
    }
    nav {
      background: #333;
      padding: 10px;
      text-align: center;
    }
    nav a {
      color: #fff;
      text-decoration: none;
      margin: 0 15px;
      font-weight: bold;
    }
    nav a:hover {
      color: #4CAF50;
    }
    .container {
      width: 90%;
      max-width: 1200px;
      margin: 20px auto;
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .welcome {
      font-size: 1.4em;
      margin-bottom: 20px;
    }
    .dashboard-widgets {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }
    .widget {
      flex: 1;
      min-width: 250px;
      background: #e9e9e9;
      padding: 20px;
      border-radius: 8px;
      text-align: center;
      font-size: 1.2em;
      color: #333;
      text-decoration: none;
      transition: background 0.3s;
    }
    .widget:hover {
      background: #dcdcdc;
    }
    footer {
      text-align: center;
      padding: 15px 0;
      background: #333;
      color: #fff;
      position: fixed;
      bottom: 0;
      width: 100%;
    }
  </style>
</head>
<body>
  <header>
    <h1>Eclat Book Management System</h1>
    <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
  </header>
  <nav>
    <a href="dashboard.php">Dashboard</a>
    <a href="logout.php">Logout</a>
  </nav>
  <div class="container">
    <div class="welcome">
      <p>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>. Use the options below to manage the system.</p>
    </div>
    <div class="dashboard-widgets">
      <a href="list.php" class="widget">Manage Books</a>
      <a href="list_users.php" class="widget">Manage Users</a>
    </div>
  </div>
  <footer>
    &copy; <?php echo date('Y'); ?> Book Management System
  </footer>
</body>
</html>
