<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>! (<a href="logout.php">Logout</a>)</p>
    <h2>Dashboard</h2>
    <ul>
        <li><a href="form.html">Manage Books</a></li>
        <li><a href="list.php">View Books</a></li>
        <li><a href="add_user.php">Add New User</a></li>
    </ul>
</body>
</html>
