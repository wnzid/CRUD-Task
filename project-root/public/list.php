<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$pageTitle = "Book List";
include_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/db.php';

$stmt = $pdo->query("SELECT * FROM book ORDER BY id ASC");
$books = $stmt->fetchAll();
?>
<h2>Book List</h2>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Actions</th>
    </tr>
    <?php if (count($books) > 0): ?>
        <?php foreach ($books as $book): ?>
            <tr>
                <td><?php echo htmlspecialchars($book['id']); ?></td>
                <td><?php echo htmlspecialchars($book['title']); ?></td>
                <td><?php echo htmlspecialchars($book['author']); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $book['id']; ?>">Edit</a> |
                    <a href="remove.php?id=<?php echo $book['id']; ?>" onclick="return confirm('Are you sure you want to delete this book?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
           <td colspan="4">No books found.</td>
        </tr>
    <?php endif; ?>
</table>
<p><a href="add_book.php">Add New Book</a></p>
<?php include_once __DIR__ . '/../includes/footer.php'; ?>
