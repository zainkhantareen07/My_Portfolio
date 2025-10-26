<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($id, $hash);
    $stmt->fetch();
    $stmt->close();

    if ($id) {
        if (password_verify($password, $hash)) {
            $_SESSION['user_id'] = $id;
            header("Location: ../pages/home.php");
            exit();
        } else {
            $_SESSION['error'] = "Incorrect password.";
            header("Location: ../pages/login.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Email not registered.";
        header("Location: ../pages/login.php");
        exit();
    }
}
?>
