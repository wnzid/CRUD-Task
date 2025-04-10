<?php
// register.php - Show registration form
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 40px;
      background-color: #f2f2f2;
    }
    h2 {
      text-align: center;
      margin-bottom: 1em;
    }
    form {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 4px;
    }
    .form-row {
      display: flex;
      align-items: center;
      margin-bottom: 1em;
    }
    .form-row label {
      width: 100px;
      margin-right: 10px;
      flex-shrink: 0;
    }
    .form-row input[type="text"],
    .form-row input[type="password"] {
      flex-grow: 1;
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 1rem;
    }
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      border: none;
      border-radius: 4px;
      color: white;
      font-size: 1rem;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #45a049;
    }
    .login-link {
      text-align: center;
      margin-top: 1em;
    }
    .login-link a {
      color: #333;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <h2>Register</h2>
  <form action="register_process.php" method="post">
    <div class="form-row">
      <label for="username">Username:</label>
      <input type="text" name="username" id="username" required>
    </div>
    <div class="form-row">
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" required>
    </div>
    <div class="form-row">
      <input type="submit" value="Register">
    </div>
  </form>
  <div class="login-link">
    Already have an account? <a href="login.php">Login here.</a>
  </div>
</body>
</html>
