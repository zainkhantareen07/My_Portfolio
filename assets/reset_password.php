<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    $stmt = $conn->prepare("SELECT id FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $code = bin2hex(random_bytes(16));
        $update = $conn->prepare("UPDATE users SET verification_code=? WHERE email=?");
        $update->bind_param("ss", $code, $email);
        $update->execute();

        $reset_link = "http://yourdomain.com/assets/reset_password.php?email=$email&code=$code";
        $subject = "Reset Your Password";
        $message = "Click the link to reset your password: $reset_link";
        $headers = "From: no-reply@yourdomain.com";

        mail($email, $subject, $message, $headers);

        $_SESSION['success'] = "Password reset link sent to your email.";
        header("Location: ../pages/login.php");
    } else {
        $_SESSION['error'] = "Email not found.";
        header("Location: ../pages/login.php");
    }
}

// Handling reset via GET link
if (isset($_GET['email'], $_GET['code']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_GET['email'];
    $code = $_GET['code'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    if ($password !== $confirm) {
        $_SESSION['error'] = "Passwords do not match.";
        header("Location: ../pages/reset_password.php");
        exit;
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE users SET password=?, verification_code='' WHERE email=? AND verification_code=?");
    $stmt->bind_param("sss", $hash, $email, $code);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Password reset successfully!";
        header("Location: ../pages/login.php");
    } else {
        $_SESSION['error'] = "Invalid reset link.";
        header("Location: ../pages/reset_password.php");
    }
}
?>
