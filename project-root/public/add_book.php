<?php
$pageTitle = "Add New Book";
include_once __DIR__ . '/../includes/header.php';
?>
<h2>Add New Book</h2>
<form action="insert.php" method="post">
    <label>Title: <input type="text" name="title" required></label><br>
    <label>Author: <input type="text" name="author" required></label><br>
    <input type="submit" value="Add Book">
    <input type="reset" value="Reset">
</form>
<p><a href="list.php">View Book List</a></p>
<?php include_once __DIR__ . '/../includes/footer.php'; ?>
