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
            
            $_SESSION['user_id']   = $user['id'] ?? null;
            $_SESSION['username']  = $user['username'] ?? null;
            $_SESSION['logged_in'] = true;

            // Redirect naar goede pagina (één map omhoog)
            header("Location: ../crud_home.php");
            exit;

        } else {
            echo "Wachtwoord is onjuist";
        }

        } else {
            echo "Er is geen gebruiker met deze e-mail";
        }




    }
?>