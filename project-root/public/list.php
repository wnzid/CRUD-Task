<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$pageTitle = "Book List";
require_once __DIR__ . '/../includes/db.php';

$stmt = $pdo->query("SELECT * FROM book ORDER BY id ASC");
$books = $stmt->fetchAll();
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
      background-color: #f3f3f3;
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
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    .add-new {
      text-align: right;
      margin-bottom: 10px;
    }
    .add-new a {
      background: #4CAF50;
      color: #fff;
      padding: 8px 15px;
      text-decoration: none;
      border-radius: 4px;
    }
    .add-new a:hover {
      background: #45a049;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    table th, table td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: left;
    }
    table th {
      background-color: #f2f2f2;
    }
    table tr:nth-child(even) {
      background-color: #f9f9f9;
    }
    .actions a {
      margin-right: 10px;
      text-decoration: none;
      color: #4CAF50;
      font-weight: bold;
    }
    .actions a:hover {
      text-decoration: underline;
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
    <a href="list_users.php">Manage Users</a>
    <a href="logout.php">Logout</a>
  </nav>
  <div class="container">
    <h2><?php echo $pageTitle; ?></h2>
    <div class="add-new">
      <a href="add_book.php">+ Add New Book</a>
    </div>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Author</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if (count($books) > 0): ?>
          <?php foreach ($books as $book): ?>
          <tr>
            <td><?php echo htmlspecialchars($book['id']); ?></td>
            <td><?php echo htmlspecialchars($book['title']); ?></td>
            <td><?php echo htmlspecialchars($book['author']); ?></td>
            <td class="actions">
              <a href="edit.php?id=<?php echo $book['id']; ?>">Edit</a>
              <a href="remove.php?id=<?php echo $book['id']; ?>" onclick="return confirm('Are you sure you want to delete this book?');">Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="4">No books found.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
  <footer>
    &copy; <?php echo date('Y'); ?> Book Management System
  </footer>
</body>
</html>
<!--done-->