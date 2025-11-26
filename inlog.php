<?php
    include("includes/connection.php");
    include("includes/header.php");
?>

<body>

<h2>Login Form</h2>

<div id="achtergrondInlog">
    <form action="includes/insert_inlog.php" method="post">
        <div class="imgcontainer">
            <img src="includes/image/hualogo.png" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="wachtwoord" required>
                
            <button type="submit" id="loginbtn">Login</button>
            <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>

        <div id="cancelbtnBox">
            <button type="button" class="cancelbtn">Cancel</button>
        </div>
    </form>
</div>

</body>
</html>