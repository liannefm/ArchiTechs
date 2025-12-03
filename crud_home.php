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

            <div class="crud_hamburger_box">
                <button class="crud_hamburger_menu" onclick="sidebar_open()">☰</button>
            </div>

            <div id="crud_button_box">

                <a href="index.php">
                    <div class="KnoppenBox">
                        Home pagina
                    </div>
                </a>

                <a href="#" id="nl-knop">
                    <div class="KnoppenBox">
                        Nederlands opties
                    </div>
                </a>

                <a href="#" id="en-knop">
                    <div class="KnoppenBox">
                        Engels opties
                    </div>
                </a>

            </div>

        </div>

        <div id="taal_content">

            <!-- Nederlands pagina -->
            <div id="inhoud-nl">
                <p>Nederlands Beheersysteem</p>

                <?php

                try {
                    $stmt = $conn->prepare("SELECT * FROM panorama");
                    $stmt->execute();

                ?>
                    <div id="panorama_manager">
                        <?php
                        foreach ($stmt->fetchAll() as $k => $v) {
                            echo "<div class='pagina_gegevens'>
                                <a href='manager_detail.php?id={$v['id']}'>
                                <img src='{$v['pagina_foto']}' alt='{$v['titel']}'>
                                <p class='pagina_nummers'>pagina {$v['pagina_nummer']}</p>
                                <p class='catalogusnummers'>{$v['catalogusnummer']}</p>
                                <p class='titels'>{$v['titel']}</p>
                                </a>

                                <a href='edit_panorama.php?id={$v['id']}'>
                                    <div class='CrudKnoppen'>
                                        Bewerken
                                    </div>
                                </a>
                            </div>";
                        }
                        ?>
                    </div>
                <?php

                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }

                ?>
            </div>

            <!-- Engels pagina -->
            <div id="inhoud-en" style="display:none;">
                <p>Engels Beheersysteem</p>

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

        // Taal wisselen
        const btnNl = document.getElementById('nl-knop');
        const btnEn = document.getElementById('en-knop');
        const contentNl = document.getElementById('inhoud-nl');
        const contentEn = document.getElementById('inhoud-en');

        btnNl.addEventListener('click', function(e) {
            e.preventDefault();
            contentNl.style.display = 'block';
            contentEn.style.display = 'none';
        });

        btnEn.addEventListener('click', function(e) {
            e.preventDefault();
            contentNl.style.display = 'none';
            contentEn.style.display = 'block';
        });
    </script>

</body>