<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
$pageTitle = "Add New Book";
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
      max-width: 500px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    .form-row {
      display: flex;
      margin-bottom: 15px;
      align-items: center;
    }
    .form-row label {
      width: 100px;
      margin-right: 10px;
      text-align: right;
    }
    .form-row input[type="text"] {
      flex: 1;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 1rem;
    }
    input[type="submit"] {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 4px;
      font-size: 1rem;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #45a049;
    }
    .link {
      text-align: center;
      margin-top: 20px;
    }
    .link a {
      color: #333;
      text-decoration: none;
      font-weight: bold;
    }
    .link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Add New Book</h2>
    <form action="insert.php" method="post">
      <div class="form-row">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
      </div>
      <div class="form-row">
        <label for="author">Author:</label>
        <input type="text" name="author" id="author" required>
      </div>
      <input type="submit" value="Add Book">
    </form>
    <div class="link">
      <a href="list.php">View Book List</a>
    </div>
  </div>
</body>
</html>
<!--done-->