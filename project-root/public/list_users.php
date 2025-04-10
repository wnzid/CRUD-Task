<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$pageTitle = "User Management";
include_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/db.php';

$stmt = $pdo->query("SELECT id, username FROM users ORDER BY id ASC");
$users = $stmt->fetchAll();
?>
<h2>User Management</h2>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Actions</th>
    </tr>
    <?php if (count($users) > 0): ?>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo htmlspecialchars($user['id']); ?></td>
            <td><?php echo htmlspecialchars($user['username']); ?></td>
            <td>
                <a href="edit_user.php?id=<?php echo $user['id']; ?>">Edit</a> |
                <a href="remove_user.php?id=<?php echo $user['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="3">No users found.</td>
        </tr>
    <?php endif; ?>
</table>
<p><a href="register.php">Add New User</a></p>
<?php include_once __DIR__ . '/../includes/footer.php'; ?>
