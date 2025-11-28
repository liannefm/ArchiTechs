<?php
    include("includes/connection.php");
    include("includes/header.php");
?>

<body>

<h2>Login Form</h2>

<div id="achtergrondInlog_register">
    <form action="includes/check_inlog.php" method="post">
        <div class="imgcontainer">
            <img src="includes/image/hualogo.png" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <!-- <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required> -->

            <label for="email"><b>E-mail</b></label>
            <input type="email" placeholder="Enter E-mail" name="email" required>
            
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
                
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