<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$pageTitle = "Edit Book";
include_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/db.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "Invalid request.";
    exit();
}

$id = (int) $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM books WHERE id = ?");
$stmt->execute([$id]);
$book = $stmt->fetch();

if (!$book) {
    echo "Book not found.";
    exit();
}
?>
<h2>Edit Book</h2>
<form action="update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $book['id']; ?>">
    <label>
        Title:
        <input type="text" name="title" value="<?php echo htmlspecialchars($book['title']); ?>" required>
    </label><br>
    <label>
        Author:
        <input type="text" name="author" value="<?php echo htmlspecialchars($book['author']); ?>" required>
    </label><br>
    <input type="submit" value="Update Book">
</form>
<p><a href="list.php">Back to Book List</a></p>
<?php include_once __DIR__ . '/../includes/footer.php'; ?>
<!--done-->