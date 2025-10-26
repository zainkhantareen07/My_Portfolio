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
  <title>Help - Zain Khan Tareen</title>
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

  <!-- ===== Help Section ===== -->
  <section class="help-section">
    <div class="help-container">
      <h2 class="section-title">How Can I Help You?</h2>
      <p class="help-intro">
        Welcome to the Help page! I'm here to support you with any questions or issues you may have regarding my projects, collaboration, or how to contact me.
      </p>

      <div class="help-cards">
        <div class="help-card">
          <h3>📦 Getting Started</h3>
          <p>New to my work? Visit the <strong>Curriculum Vitae</strong> page or check my <strong>Resume</strong> for background info.</p>
        </div>

        <div class="help-card">
          <h3>🧑‍💻 Project Inquiries</h3>
          <p>Have a project idea or need a developer? I'm open to freelance, internships, and open-source contributions.</p>
        </div>

        <div class="help-card">
          <h3>🤝 Collaboration</h3>
          <p>Looking to collaborate on impactful web development, AI, and software projects.</p>
        </div>

        <div class="help-card">
          <h3>🛠️ Troubleshooting</h3>
          <p>Facing issues with code from my GitHub or projects you've seen? Reach out through the <strong>Contact</strong> page.</p>
        </div>

        <div class="help-card">
          <h3>📩 Contact & Support</h3>
          <p>For anything else, feel free to leave a message through the <strong>Contact</strong> or <strong>Feedback</strong> page.</p>
        </div>

        <div class="help-card">
          <h3>❓ Frequently Asked</h3>
          <ul>
            <li><strong>Q:</strong> What technologies do you use?</li>
            <li><strong>A:</strong> HTML, CSS, JavaScript, React, Python, C#, C++, PHP, Java, and more.</li>
            <li><strong>Q:</strong> Are you available for freelance work?</li>
            <li><strong>A:</strong> Yes! Let’s discuss your idea.</li>
            <li><strong>Q:</strong> Do you work with teams?</li>
            <li><strong>A:</strong> Yes, I enjoy team collaborations and open-source projects.</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

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
