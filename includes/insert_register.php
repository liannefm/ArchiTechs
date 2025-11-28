<?php
    include("connection.php");

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $username = $_POST['username'] ?? '';
        $email    = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        
        // 1. Check of e-mail al bestaat
        $checkSql = "SELECT 1 FROM inlog_gegevens WHERE email = :email";
        $stmt = $conn->prepare($checkSql);
        $stmt->execute([':email' => $email]);

         if ($stmt->fetch()) {
            echo "E-mail heeft al een account";
        } else {
            
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            $insertSql= "INSERT INTO inlog_gegevens(username, email, password) VALUES (:username, :email, :password)";

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








?>