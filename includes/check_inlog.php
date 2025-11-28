<?php
    include("connection.php");


    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $email    = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $stmt = $conn->prepare("SELECT * FROM inlog_gegevens WHERE email = :email");
        $stmt->execute(['email' => $email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {

        // Wachtwoord check
        if (password_verify($password, $user['password'])) {
            echo "Login succesvol, welkom " . htmlspecialchars($user['username']);

            header("Location: crud_home.php");
        } else {
            echo "Wachtwoord is onjuist";
        }

        } else {
            echo "Er is geen gebruiker met deze e-mail";
        }




    }
?>