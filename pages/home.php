<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to login page
    header("Location: ../assets/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Zain Khan Tareen — Curriculum Vitae</title>
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

<!-- ===== HERO SECTION ===== -->
<div class="hero">
  <div class="content">
    <span class="title">BS SOFTWARE ENGINEERING STUDENT</span>
    <h1>Hello, I’m <span>Zain Khan Tareen</span></h1>
    <p>
      🎓 Software Engineering Student | BUITEMS Quetta <br>
      👨‍💻 Passionate about coding, technology, and innovation <br>
      📍 Quetta | Age: 20 <br><br>
      I'm currently pursuing a Bachelor's in Software Engineering at BUITEMS Quetta, with a strong interest in
      software development, problem-solving, and emerging technologies. I enjoy building creative tech solutions and
      learning new tools and frameworks that can make a real-world impact.
    </p>

    <h3>💡 Areas of Interest:</h3>
    <ul>
      <li>Web & App Development</li>
      <li>AI & Machine Learning</li>
      <li>UI/UX Design</li>
      <li>Cybersecurity</li>
      <li>Cloud Computing</li>
      <li>Computer Networks</li>
      <li>Open Source Contribution</li>
    </ul><br>

    🚀 Always open to collaboration, internships, and new learning opportunities. Let’s connect and grow together in
    tech!<br><br>
    <a href="zainresume.pdf" class="btn" target="_blank">Open My CV</a>
  </div>
</div>

  <!-- ===== JAVASCRIPT ===== -->
  <script>
  // Profile Modal Controls
  function openProfileModal() {
    const modal = document.getElementById("profileModal");
    if (modal) modal.style.display = "block";
  }

  function closeProfileModal() {
    const modal = document.getElementById("profileModal");
    if (modal) modal.style.display = "none";
  }

  // Close modal when clicking outside of it
  window.onclick = function (event) {
    const modal = document.getElementById("profileModal");
    if (modal && event.target === modal) {
      modal.style.display = "none";
    }
  };

  // Mobile Menu (Navbar)
  document.addEventListener("DOMContentLoaded", () => {
    const toggle = document.getElementById("mobile-menu");
    const navMenu = document.querySelector(".nav-menu");

    if (!toggle || !navMenu) return;

    toggle.addEventListener("click", () => {
      navMenu.classList.toggle("active");
      toggle.classList.toggle("open");
    });

    navMenu.querySelectorAll("a").forEach(link => {
      link.addEventListener("click", () => {
        if (navMenu.classList.contains("active")) {
          navMenu.classList.remove("active");
          toggle.classList.remove("open");
        }
      });
    });

    document.addEventListener("click", (e) => {
      if (!navMenu.contains(e.target) && !toggle.contains(e.target)) {
        navMenu.classList.remove("active");
        toggle.classList.remove("open");
      }
    });
  });
  </script>

</body>
</html>
