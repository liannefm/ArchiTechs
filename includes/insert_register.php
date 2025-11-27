<?php
    include("includes/connection.php");

    if($_SERVER["REQUEST_METHODE"] == "POST"){

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        
        $checkEmail = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($checkEmail);

        if ($result->num_rows > 0){
            echo "E-mail heeft al een account";
        } else {
            echo "Maak nu een acount"


            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            $sql = "INSERT INTO inlog_gegevens(username, email, password) VALUES ('$username','$email','$hashed_password')"
        
            if($conn->query($sql)===TRUE){
                echo "Account gemaakt"
            }  else{
                echo "Error"  .$sql.$conn->error;
            }  
        }
    }








?>