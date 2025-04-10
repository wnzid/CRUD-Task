<?php
$pageTitle = "User Registration";
include_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    if ($stmt->execute([$username, $hashedPassword])) {
        header("Location: login.php");
        exit();
    } else {
        $error = "Registration failed. Try again.";
        echo "<p style='color:red;'>" . htmlspecialchars($error) . "</p>";
    }
}
?>

<h2>Register New User</h2>
<form action="register.php" method="post">
    <label>Username: <input type="text" name="username" required></label><br>
    <label>Password: <input type="password" name="password" required></label><br>
    <input type="submit" value="Register">
</form>

<?php include_once __DIR__ . '/../includes/footer.php'; ?>
