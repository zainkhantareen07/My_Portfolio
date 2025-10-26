<?php
require 'config.php';

if (isset($_GET['email'], $_GET['code'])) {
    $email = $_GET['email'];
    $code = $_GET['code'];

    $stmt = $conn->prepare("SELECT id FROM users WHERE email=? AND verification_code=? AND is_verified=0");
    $stmt->bind_param("ss", $email, $code);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $update = $conn->prepare("UPDATE users SET is_verified=1 WHERE email=?");
        $update->bind_param("s", $email);
        $update->execute();

        echo "Email verified successfully! <a href='../pages/login.php'>Login Now</a>";
    } else {
        echo "Invalid or already verified link.";
    }
}
?>
