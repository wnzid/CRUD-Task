<?php
$pageTitle = "User Login";
include_once __DIR__ . '/../includes/header.php';
?>
<h2>User Login</h2>
<?php if (isset($_GET['error'])): ?>
    <p style="color:red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
<?php endif; ?>
<form action="login_process.php" method="post">
    <label>Username: <input type="text" name="username" required></label><br>
    <label>Password: <input type="password" name="password" required></label><br>
    <input type="submit" value="Login">
</form>
<p>New user? <a href="register.php">Register here</a>.</p>
<?php
include_once __DIR__ . '/../includes/footer.php';
?>
