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

                <div class="crud_dropdown_box">
                    <button class="crud_dropdown_btn">
                        <i class="fas fa-chevron-right"></i>
                        <span id="tekstgrootte">Nederlands opties</span>
                    </button>

                    <div class="crud_dropdown_container">
                        <a href="#" id="NaarPanoramaNl">panorama pagina's</a>
                        <a href="#" id="NaarAanvullendNl">aanvullende pagina's</a>
                    </div>
                </div>

                <a href="#" id="NaarPanoramaEn">
                    <div class="KnoppenBox">
                        Engels opties
                    </div>
                </a>

            </div>

        </div>

        <div id="taal_content">

            <!-- panoramaNl pagina -->
            <div id="InhoudPanoramaNl">
                <?php

                try {
                    $stmt = $conn->prepare("SELECT * FROM panorama");
                    $stmt->execute();

                ?>
                    <div id="panorama_manager">
                        <?php
                        foreach ($stmt->fetchAll() as $k => $v) {
                            echo "<div class='pagina_gegevens'>
                            <img src='{$v['pagina_foto']}' alt='{$v['titel']}'>
                            <p class='pagina_nummers'>pagina {$v['pagina_nummer']}</p>
                            <p class='catalogusnummers'>{$v['catalogusnummer']}</p>
                            <p class='titels'>{$v['titel']}</p>
                            
                            <a href='edit_panorama.php?id={$v['id']}'>
                                <div class='CrudKnoppen'>
                                    Bewerken
                                </div>
                            </a>
                            <a href='manager_detail.php?id={$v['id']}'>
                                <div class='CrudKnoppen'>
                                    detail
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

            <!-- InhoudAanvullendNl pagina -->
            <div id="InhoudAanvullendNl" style="display:none;">
                <h2>InhoudAanvullendNl</h2>
                <?php

                try {
                    $stmt = $conn->prepare("SELECT * FROM extra_info");
                    $stmt->execute();

                ?>
                    <div id="panorama_manager">
                        <?php
                        foreach ($stmt->fetchAll() as $k => $v) {
                            echo "<div class='pagina_gegevens'>
                            <img src='{$v['foto']}' alt='catalogusnummer: {$v['catalogusnummer']}'>
                            <p class='pagina_nummers'>pagina {$v['pagina_nummer']}</p>
                            <p class='catalogusnummers'>{$v['catalogusnummer']}</p>
                            <p class='titels'>{$v['aanvullende_info']}</p>
                            
                            <a href='edit_aanvullendNl.php?id={$v['id']}'>
                                <div class='CrudKnoppen'>
                                    Bewerken
                                </div>
                            </a>
                            <a href='manager_detail.php?id={$v['id']}'>
                                <div class='CrudKnoppen'>
                                    detail
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
            <div id="InhoudPanoramaEn" style="display:none;">
                <p>Engels Beheersysteem</p>
            </div>

        </div>
    </div>

    <script>
        // laat de sidebar zien
        function sidebar_open() {
            document.getElementById("mySidebar").style.display = "block";
        }

        // laat de sidebar niet meer zien
        function sidebar_close() {
            document.getElementById("mySidebar").style.display = "none";
        }


        function setSection(section) {
            const sections = ['PanoramaNl', 'AanvullendNl', 'PanoramaEn'];

            sections.forEach(name => {
                const el = document.getElementById('Inhoud' + name);
                if (!el) return;

                if (name === section) {
                    el.style.display = 'block';
                } else {
                    el.style.display = 'none';
                }
            });

            // opslaan welke sectie actief is
            localStorage.setItem('actieveSectie', section);
        }

        // pagina inhoud wisselen
        const NaarPanoramaNl = document.getElementById('NaarPanoramaNl');
        const NaarAanvullendNl = document.getElementById('NaarAanvullendNl');
        const NaarPanoramaEn = document.getElementById('NaarPanoramaEn');

        const InhoudPanoramaNl = document.getElementById('InhoudPanoramaNl');
        const InhoudAanvullendNl = document.getElementById('InhoudAanvullendNl');
        const InhoudPanoramaEn = document.getElementById('InhoudPanoramaEn');

        // als je opnieuw laad juiste sectie kiezen
        (function initSection() {
            const saved = localStorage.getItem('actieveSectie');
            if (saved === 'PanoramaNl' || saved === 'AanvullendNl' || saved === 'PanoramaEn') {
                setSection(saved);
            } else {
                setSection('PanoramaNl'); // als er niks is opgeslagen gaat die naar deze
            }
        })();

        // slaat op in welke sectie je zit
        NaarPanoramaNl.addEventListener('click', function(e) {
            e.preventDefault();
            setSection('PanoramaNl');
        });

        NaarAanvullendNl.addEventListener('click', function(e) {
            e.preventDefault();
            setSection('AanvullendNl');
        });

        NaarPanoramaEn.addEventListener('click', function(e) {
            e.preventDefault();
            setSection('PanoramaEn');
        });

        // dropdown
        var dropdown = document.getElementsByClassName("crud_dropdown_btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;

                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }

        // sluit dropdown wanneer je op een optie klikt
        const dropdownOptions = document.querySelectorAll(".crud_dropdown_container a");

        dropdownOptions.forEach(option => {
            option.addEventListener("click", function() {
                this.parentElement.style.display = "none";
                this.parentElement.previousElementSibling.classList.remove("active");
            });
        });
    </script>

</body>