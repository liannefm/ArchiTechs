<?php
session_start();

include("connection.php");

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function showError($errorMessage)
{
    $_SESSION['error'] = $errorMessage;
    header("Location: ../inlog.php");
    exit;
}

if (!isset($_POST['email']) || !isset($_POST['password'])) {
    showError('Zorg dat alle velden ingevuld zijn.');
}

$email    = test_input($_POST['email']);
$password = test_input($_POST['password']);

if (empty($email) || empty($password)) {
    showError('Zorg dat alle velden ingevuld zijn.');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    showError('Voer een geldig e-mailadres in.');
}

$stmt = $conn->prepare("SELECT * FROM inlog_gegevens WHERE email = :email");
$stmt->execute(['email' => $email]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    // Wachtwoord check
    if (password_verify($password, $user['password'])) {

        if (isset($_POST['remember'])) {
            $token = '';

            while (empty($token)) {
                $newToken = bin2hex(random_bytes(48));

                $checkToken = $conn->prepare("SELECT * FROM inlog_gegevens WHERE remember_token = :remember_token");
                $checkToken->execute(['remember_token' => $newToken]);

                if ($checkToken->rowCount() == 0) {
                    $token = $newToken;
                }
            }

            $updateUser = $conn->prepare("UPDATE inlog_gegevens SET remember_token=:remember_token WHERE id=:user_id");
            $updateUser->execute(['user_id' => $user['id'], 'remember_token' => $token]);

            setcookie('remember_token', $token, time() + (86400 * 365), "/");
        }

        $_SESSION['user_id']   = $user['id'];
        $_SESSION['username']  = $user['username'];
        $_SESSION['logged_in'] = true;

        $_SESSION['user'] = $user['email'];

        header("Location: ../crud_home.php");
        exit;
    } else {
        showError('De combinatie van gebruikersnaam en wachtwoord is ongeldig.');
        exit;
    }
} else {
    showError('De combinatie van gebruikersnaam en wachtwoord is ongeldig.');
    exit;
}
