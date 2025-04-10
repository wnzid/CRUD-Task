<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
$pageTitle = "Manage Users";
require_once __DIR__ . '/../includes/db.php';

$stmt = $pdo->query("SELECT id, username FROM users ORDER BY id ASC");
$users = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $pageTitle; ?></title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 800px;
      margin: 50px auto;
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    .nav-links {
      text-align: center;
      margin-bottom: 20px;
    }
    .nav-links a {
      display: inline-block;
      margin: 0 10px;
      color: #007BFF;
      text-decoration: none;
    }
    .nav-links a:hover {
      text-decoration: underline;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    table th, table td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: center;
    }
    table th {
      background-color: #4CAF50;
      color: #fff;
    }
    .actions a {
      color: #007BFF;
      text-decoration: none;
      margin: 0 5px;
    }
    .actions a:hover {
      text-decoration: underline;
    }
    .add-user,
    .back-dashboard {
      text-align: center;
      margin-top: 20px;
    }
    .add-user a,
    .back-dashboard a {
      display: inline-block;
      padding: 10px 20px;
      background-color: #4CAF50;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      margin: 0 5px;
    }
    .add-user a:hover,
    .back-dashboard a:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Manage Users</h2>
    <div class="nav-links">
      <a href="dashboard.php">Back to Dashboard</a>
    </div>
    <table>
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Actions</th>
      </tr>
      <?php if(count($users) > 0): ?>
        <?php foreach($users as $user): ?>
        <tr>
          <td><?php echo htmlspecialchars($user['id']); ?></td>
          <td><?php echo htmlspecialchars($user['username']); ?></td>
          <td class="actions">
            <a href="edit_user.php?id=<?php echo $user['id']; ?>">Edit</a>
            <a href="remove_user.php?id=<?php echo $user['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
          </td>
        </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="3">No users found.</td>
        </tr>
      <?php endif; ?>
    </table>
    <div class="add-user">
      <a href="add_user.php">Add New User</a>
    </div>
    <div class="back-dashboard">
      <a href="dashboard.php">Back to Dashboard</a>
    </div>
  </div>
</body>
</html>
<!--done-->