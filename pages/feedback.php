<?php
session_start();

// Redirect if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../assets/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Feedback - Zain Khan Tareen</title>
  <link rel="stylesheet" href="../pages/style.css" />
  <link rel="shortcut icon" href="../media/icon.jpeg" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar">
  <div class="nav-container">
    <div class="nav-left">
      <img src="../media/zain.jpg" alt="logo" class="logo">
    </div>

    <ul class="nav-menu">
      <li><a href="home.php">Home</a></li>
      <li><a href="curriculum-vitae.php">Curriculum Vitae</a></li>
      <li><a href="feedback.php">Feedback</a></li>
      <li><a href="help.php">Help</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="../assets/logout.php">Logout</a></li>
    </ul>

    <div class="nav-right">
      <a href="../myresume/zainresume.pdf" class="btn" target="_blank">Resume</a>

      <!-- hamburger for mobile -->
      <button id="mobile-menu" class="menu-toggle" aria-label="Toggle menu">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </button>
    </div>
  </div>
</nav>

<!-- ===== FEEDBACK SECTION ===== -->
<h2 class="section-title">💬 Feedback</h2>
<div class="feedback-container">
  <p>Thank you for visiting my portfolio. You can share your feedback here:</p>

  <form action="../assets/submit_feedback.php" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="message">Message:</label>
    <textarea id="message" name="message" rows="5" required></textarea>

    <button type="submit" class="btn">Submit Feedback</button>
  </form>
</div>

<!-- ===== Mobile Navbar Script ===== -->
<script>
document.addEventListener("DOMContentLoaded", () => {
  const menu = document.getElementById("mobile-menu");
  const navMenu = document.querySelector(".nav-menu");

  if (!menu || !navMenu) return;

  menu.addEventListener("click", () => {
    navMenu.classList.toggle("active");
    menu.classList.toggle("active");
  });

  navMenu.querySelectorAll("a").forEach(link => {
    link.addEventListener("click", () => {
      navMenu.classList.remove("active");
      menu.classList.remove("active");
    });
  });

  document.addEventListener("click", (e) => {
    if (!menu.contains(e.target) && !navMenu.contains(e.target)) {
      navMenu.classList.remove("active");
      menu.classList.remove("active");
    }
  });
});
</script>

</body>
</html>
