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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = test_input($_POST['username']);
    $email    = test_input($_POST['email']);
    $password = test_input($_POST['password']);

    // 1. Check of e-mail al bestaat
    $checkSql = "SELECT 1 FROM inlog_gegevens WHERE email = :email";
    $stmt = $conn->prepare($checkSql);
    $stmt->execute([':email' => $email]);

    if ($stmt->fetch()) {
        echo "E-mail heeft al een account";
    } else {

        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $insertSql = "INSERT INTO inlog_gegevens(username, email, password) VALUES (:username, :email, :password)";

        $insert = $conn->prepare($insertSql);

        $success = $insert->execute([
            ':username' => $username,
            ':email'    => $email,
            ':password' => $hashed_password
        ]);

        if ($success) {
            echo "Account gemaakt";
        } else {
            $errorInfo = $insert->errorInfo();
            echo "Error bij invoegen: " . $errorInfo[2];
        }
    }
}
