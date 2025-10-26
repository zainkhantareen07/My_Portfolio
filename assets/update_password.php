<?php
session_start();
require 'config.php';

if (!isset($_SESSION['reset_email'])) {
    header("Location: ../pages/reset_password.php");
    exit;
}

$email = $_SESSION['reset_email'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_password = $_POST['new_password'];
    $confirm = $_POST['confirm_password'];

    if ($new_password !== $confirm) {
        $_SESSION['error'] = "Passwords do not match.";
        header("Location: ../pages/reset_password.php");
        exit;
    }

    $hashed = password_hash($new_password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE users SET password=? WHERE email=?");
    $stmt->bind_param("ss", $hashed, $email);
    $stmt->execute();

    unset($_SESSION['reset_email']);
    $_SESSION['success'] = "Password updated successfully. Please login.";
    header("Location: ../pages/login.php");
}
