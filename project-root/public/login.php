<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
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
    .register-link {
      text-align: center;
      margin-top: 1em;
    }
    .register-link a {
      color: #333;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <h2>Login</h2>
  <form action="login_process.php" method="post">
    <div class="form-row">
      <label for="email">Email:</label>
      <input type="text" name="email" id="email" required>
    </div>
    <div class="form-row">
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" required>
    </div>
    <div class="form-row">
      <input type="submit" value="Login">
    </div>
  </form>
  <div class="register-link">
    No account? <a href="register.php">Register here.</a>
  </div>
</body>
</html>
