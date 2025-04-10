<?php
// public/edit_user.php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$pageTitle = "Edit User";
include_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/db.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "Invalid request.";
    exit();
}

$userId = (int) $_GET['id'];
$stmt = $pdo->prepare("SELECT id, username FROM users WHERE id = ?");
$stmt->execute([$userId]);
$user = $stmt->fetch();

if (!$user) {
    echo "User not found.";
    exit();
}
?>
<h2>Edit User</h2>
<form action="update_user.php" method="post">
    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
    <label>
        Username:
        <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
    </label><br>
    <label>
        New Password (leave blank to keep current password):
        <input type="password" name="password">
    </label><br>
    <input type="submit" value="Update User">
</form>
<p><a href="list_users.php">Back to User Management</a></p>
<?php include_once __DIR__ . '/../includes/footer.php'; ?>
