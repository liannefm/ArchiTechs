<?php
if (!isset($_SESSION['user_id']) && isset($_COOKIE['remember_token'])) {
    $rememberToken = $_COOKIE['remember_token'];

    $checkRememberToken = $conn->prepare("SELECT * FROM inlog_gegevens WHERE remember_token = :remember_token");
    $checkRememberToken->execute(['remember_token' => $rememberToken]);

    if ($checkRememberToken->rowCount() == 1) {
        $user = $checkRememberToken->fetch(PDO::FETCH_ASSOC);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['logged_in'] = true;

        $_SESSION['user'] = $user['email'];
    } else {
        unset($_COOKIE["remember_token"]);
    }
}
