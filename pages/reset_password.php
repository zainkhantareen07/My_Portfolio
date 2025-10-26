<?php
session_start();
require '../assets/config.php';

$message = '';
$show_form = true;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Check if email exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Email exists → show new password form
        $show_form = false;
        $_SESSION['reset_email'] = $email;
    } else {
        $message = "Email not registered.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reset Password</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-container">
  <h2>Reset Password</h2>

  <?php if($message): ?>
    <p style="color:red;"><?= htmlspecialchars($message) ?></p>
  <?php endif; ?>

  <?php if($show_form): ?>
    <form method="POST">
      <input type="email" name="email" placeholder="Enter your email" required>
      <button type="submit">Submit</button>
    </form>
  <?php else: ?>
    <form action="../assets/update_password.php" method="POST">
      <input type="password" name="new_password" placeholder="New Password" required>
      <input type="password" name="confirm_password" placeholder="Confirm Password" required>
      <button type="submit">Reset Password</button>
    </form>
  <?php endif; ?>
</div>
</body>
</html>
