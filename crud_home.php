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

        <?php
        include("includes/topbar_crud.php");
        ?>

        <div id="taal_content">

            <!-- panoramaNl pagina -->
            <div id="InhoudPanoramaNL">
                <div class="AchtergrondOverzicht">
                    <h2>Inhoud panorama Nl</h2>
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
                                <a href='detail_panorama.php?id={$v['id']}'>
                                    <div class='CrudKnoppen'>
                                        Detail
                                    </div>
                                </a>
                                <a href='crud_hotspots.php?id={$v['id']}'>
                                    <div class='CrudKnoppen'>
                                        Hotspots
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
            </div>

            <!-- InhoudAanvullendNl pagina -->
            <div id="InhoudAanvullendNL" style="display:none;">
                <div class="AchtergrondOverzicht">
                    <h2>Inhoud aanvullend Nl</h2>
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
            </div>

            <!-- Engels pagina -->
            <div id="InhoudPanoramaEn" style="display:none;">
                <p>Engels Beheersysteem</p>
            </div>

        </div>
    </div>

    <script>
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
    </script>

</body>