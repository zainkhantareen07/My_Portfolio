<?php
session_start();
$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="form-container">
    <h2>Login</h2>

    <?php if ($error): ?>
      <p class="error-message" style="color:red; text-align:center;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="../assets/login.php" method="POST">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>

    <p class="signup-link">Don't have an account? <a href="signup.php">Sign Up</a></p>
    <p class="signup-link"><a href="reset_password.php">Forgot Password?</a></p>
  </div>
</body>
</html>
