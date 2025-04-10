<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$pageTitle = "Dashboard";
include_once __DIR__ . '/../includes/header.php';
?>
<h2>Dashboard</h2>
<p>You are logged in as: <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong></p>
<ul>
    <li><a href="list.php">Manage Books</a></li>
    <li><a href="register.php">Manage Users</a></li>
</ul>
<?php
include_once __DIR__ . '/../includes/footer.php';
?>
