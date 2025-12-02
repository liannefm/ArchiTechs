<!-- logout pagina -->
<?php

session_start();

if (isset($_COOKIE["remember_token"])) {
    setcookie("remember_token", "", time() - 3600, "/");
    unset($_COOKIE["remember_token"]);
}

session_unset();
session_destroy();
header("Location: ../inlog.php");
exit();

?>