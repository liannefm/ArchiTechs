<?php

session_start();

include("includes/connection.php");
include("includes/user_ingelogd.php");
include("includes/header.php");

if (!isset($_SESSION['user'])) {
    header("location: inlog.php");
}

?>

<body>
    <div id="achtergrond_crud_home">
        <div class="mySidebar" style="display:none" id="mySidebar">
            <div id="crud_home_sidebar">

                <div id="sidebar_box">
                    <button onclick="sidebar_close()" class="close_button">&times;</button>
                    <!-- hier komen de knoppen -->
                </div>

                <div class="crud_home_avatar_container">
                    <img src="includes/image/hualogo.png" alt="Avatar" class="avatar">
                </div>

                <?php
                try {
                    $stmt = $conn->prepare("SELECT username, email FROM inlog_gegevens");
                    $stmt->execute();

                    foreach ($stmt->fetchAll() as $k => $v) {
                        echo "<div class='inlog_gegevens_box'>
                            <div id='username'><p>{$v['username']}</p></div>
                            <div id='email'><p>{$v['email']}</p></div>
                        </div>";
                    }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                ?>

                <div id="sidebar_footer">
                    <form action="includes/logout.php" method="POST">
                        <button id="logout" class="logout_btn" type="submit">log uit</button>
                    </form>
                </div>

                <p>&copy; 2025 Het Utrechts Archief</p>
            </div>
        </div>

        <div id="topbar_topbar">

            <div class="hamburger_box">
                <button class="hamburger_menu" onclick="sidebar_open()">☰</button>
            </div>

            <div id="crud_button_box">

            </div>
        </div>
    </div>

    <script>
        function sidebar_open() {
            document.getElementById("mySidebar").style.display = "block";
        }

        function sidebar_close() {
            document.getElementById("mySidebar").style.display = "none";
        }
    </script>

</body>