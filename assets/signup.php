<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first = trim($_POST['first_name']);
    $last = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    // Password match check
    if ($password !== $confirm) {
        $_SESSION['error'] = "Passwords do not match.";
        header("Location: ../pages/signup.php");
        exit();
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $_SESSION['error'] = "Email already registered.";
        header("Location: ../pages/signup.php");
        exit();
    }

    $hashed = password_hash($password, PASSWORD_DEFAULT);

    // Insert user (no verification_code)
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $first, $last, $email, $hashed);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Registration successful! You can now log in.";
        header("Location: ../pages/login.php");
        exit();
    } else {
        $_SESSION['error'] = "Something went wrong, try again.";
        header("Location: ../pages/signup.php");
        exit();
    }
}
?>
