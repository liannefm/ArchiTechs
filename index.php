<?php
include("includes/header.php");
include("includes/connection.php");

try {
    // 1) Alle panorama-pagina's
    $stmt = $conn->prepare("
        SELECT 
            id,
            pagina_foto,
            pagina_nummer,
            titel,
            img_height,
            img_margin_left,
            img_margin_top,
            img_z_index
        FROM panorama
        ORDER BY pagina_nummer ASC
    ");
    $stmt->execute();
    $panoramaRijen = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 2) Alle extra info / waypoints per pagina
    $stmt2 = $conn->prepare("
    SELECT 
        pagina_nummer,
        aanvullende_info,
        waypoint_top,
        waypoint_left,
        foto
    FROM extra_info
    ");
    $stmt2->execute();
    $waypointsRaw = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    // 3) Groeperen per pagina_nummer -> meerdere waypoints per pagina
    $waypointsPerPagina = [];
    foreach ($waypointsRaw as $wp) {
        $page = (int)$wp['pagina_nummer'];
        if (!isset($waypointsPerPagina[$page])) {
            $waypointsPerPagina[$page] = [];
        }
        $waypointsPerPagina[$page][] = $wp;
    }
} catch (PDOException $e) {
    die('Database-fout: ' . $e->getMessage());
}
?>

<body>
    <div id="achtergrond">
        <!-- Sidebar -->
        <div class="mySidebar" style="display:none" id="mySidebar">
            <div id="sidebar">

                <div id="sidebar_box">
                    <button onclick="sidebar_close()" class="close_button">&times;</button>
                </div>
                <div id="sidebarbox">
                    <img src="includes/image/hualogo.png" id="imgsidebar" alt="hualogo">
                    <h2 id="titel">Het Utrechts Archief</h2>
                </div>

                <div id="lightmode"><span id="lichtmodus" class="show">lichtmodus</span><span id="donkeremodus">donkere modus</span><label class="switch"><input onChange="toggleDarkMode()" type="checkbox"><span class="slider round"></span></label></div><br>

                <div id="hotspot">hotspot<label class="switch"><input id="hotspotToggle" type="checkbox" checked><span class="slider round"></span></label></div>

                <button class="dropdown-btn">
                    <span id="talen">talen</span>
                    <i class="fas fa-chevron-right"></i>
                </button>


                <div class="dropdown-container">

                    <a href="#"><img src="includes/image/flags/netherlands.svg"> <button onclick="setLanguage('nl')" id="talenknopnl">Nederlands</button></a>
                    <a href="#"><img src="includes/image/flags/united-kingdom.svg"> <button onclick="setLanguage('en')" id="talenknopen">Engels</button></a>
                </div><br>

                <!-- <button class="dropdown-btn">
                    <span id="tekstgrootte">tekstgrootte</span>
                    <i class="fas fa-chevron-right"></i>
                </button> -->

                <!-- <div class="dropdown-container">
                    <a href="#" id="klein">klein</a>
                    <a href="#" id="middel">middel</a>
                    <a href="#" id="groot">groot</a>
                </div> -->

                <!-- <div class="toolbar">
                    <button id="fit" class="btn" title="Pas afbeelding in het scherm">Fit</button>
                    <button id="reset" class="btn" title="Reset positie en zoom">Reset</button>
                    <span class="badge" id="zoomLabel">100%</span>
                </div> -->

                <div class="minimap-wrap">
                    <div class="minimap-head">
                        <span>Minimap</span>
                        <span class="hint">scroll = zoom</span>
                    </div>
                    <canvas id="minimap" width="440" height="300" aria-label="minimap"></canvas>
                </div>

                <p>&copy; 2025 Het Utrechts Archief</p>
            </div>
        </div>

        <div id="panoramaknoppen">
            <div id="topbar">
                <div class="hamburger_box">
                    <button class="hamburger_menu" onclick="sidebar_open()">☰</button>
                </div>
                <div id="titelbox">
                    <h1 id="titelpagina">De geschiedenis van Utrecht</h1>
                </div>
            </div>
            <div class="panorama-wrapper">
                <div class="panorama">
                    <?php foreach ($panoramaRijen as $row): ?>
                        <?php
                        $paginaNummer = (int)$row['pagina_nummer'];

                        // Afbeeldingspad netjes maken
                        $src = str_replace('\\', '/', $row['pagina_foto']);

                        // Posities uit de DB
                        $height     = $row['img_height']      ?? 500;
                        $marginLeft = $row['img_margin_left'] ?? 0;
                        $marginTop  = $row['img_margin_top']  ?? 0;
                        $zIndex     = $row['img_z_index']     ?? $paginaNummer;

                        // Alle waypoints die bij deze pagina horen (via pagina_nummer)
                        $waypoints = $waypointsPerPagina[$paginaNummer] ?? [];
                        ?>

                        <!-- Wrapper voor één pagina: hieraan hangen de waypoints -->
                        <div class="panorama-page"
                            style="
                    margin-left: <?= (int)$marginLeft; ?>px;
                    margin-top:  <?= (int)$marginTop; ?>px;
                    z-index:     <?= (int)$zIndex; ?>;
                 ">

                            <!-- De panorama-afbeelding zelf -->
                            <img src="<?= htmlspecialchars($src); ?>"
                                alt="Panorama pagina <?= $paginaNummer; ?>"
                                style="height: <?= (int)$height; ?>px;">

                            <!-- Alle waypoints voor deze pagina -->
                            <?php foreach ($waypoints as $wp): ?>
                                <?php
                                // posities uit de database
                                $wpTop  = $wp['waypoint_top']  ?? 0;
                                $wpLeft = $wp['waypoint_left'] ?? 0;

                                // Foto uit extra_info
                                $fotoPath = $wp['foto'] ?? '';
                                $fotoPath = str_replace('\\', '/', $fotoPath);

                                // Placeholder die NIET getoond mag worden
                                $placeholder = 'includes/image/aanvullende_fotos/GeenFotoBeschikbaar.png';

                                // Alleen tonen als het geen placeholder is
                                $toonFoto = !empty($fotoPath) && $fotoPath !== $placeholder;
                                ?>

                                <!-- Waypoint nu met TOP + LEFT uit de DB -->
                                <div class="waypoint"
                                    style="top: <?= (int)$wpTop; ?>px; left: <?= (int)$wpLeft; ?>px;">
                                    <span><i class="fa-solid fa-question"></i></span>

                                    <div class="info">
                                        <?php if ($toonFoto): ?>
                                            <img src="<?= htmlspecialchars($fotoPath); ?>"
                                                alt="Aanvullende foto pagina <?= $paginaNummer; ?>"
                                                style="max-width: 100%; height: auto; margin-bottom: 8px; border-radius: 10px;">
                                        <?php endif; ?>

                                        <p><?= nl2br(htmlspecialchars($wp['aanvullende_info'])); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div><!-- /panorama-page -->

                    <?php endforeach; ?>
                </div>
            </div>

        </div>
        <div id="zoomen">
            <button class="cirkel" onclick="zoomOut()">
                <img src="includes/image/verkleinglas.png" alt="uitzoomen" id="verkleinglas">
            </button>

            <button class="cirkel" onclick="zoomIn()">
                <img src="includes/image/vergrootglas.png" alt="inzoomen">
            </button>

            <button class="cirkel" onclick="resetZoom()">
                <span id="resetknoppanorama">↺</span>
            </button>
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

    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;

            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }

    function toggleDarkMode() {
        var element = document.body;
        const lightModeTextElement = document.querySelector('#lichtmodus');
        const darkModeTextElement = document.querySelector('#donkeremodus');

        element.classList.toggle("dark-mode");
        if (element.classList.contains('dark-mode')) {
            lightModeTextElement.classList.remove('show');
            darkModeTextElement.classList.add('show');
        } else {
            lightModeTextElement.classList.add('show');
            darkModeTextElement.classList.remove('show');
        }
    }

    let translations;
        const hotspotToggle = document.getElementById("hotspotToggle");

        //hotspots tonen/verbergen
        function updateHotspots() {
            if (hotspotToggle.checked) {
                document.body.classList.remove("hide-hotspots");
            } else {
                document.body.classList.add("hide-hotspots");
            }
        }

        // Start met hotspots aan
        updateHotspots();

        // hotspots worden zichtbaar of niet zichtbaar
        hotspotToggle.addEventListener("change", updateHotspots);


    fetch("translations.json")
        .then(res => res.json())
        .then(data => {
            translations = data;

            const userLang = navigator.language.startsWith("nl") ? "nl" : "en";
            setLanguage(userLang);
        });

    function setLanguage(lang) {
        Object.entries(translations[lang]).forEach(([key, value]) => {
            const selectedElement = document.getElementById(key);
            if (selectedElement) {
                selectedElement.innerText = value;
            }
        });
    }

    const panoramaContainer = document.querySelector('.panorama-wrapper .panorama');

    panoramaContainer.addEventListener('click', function (e) {
        const waypoint = e.target.closest('.waypoint');
        const openedInfos = panoramaContainer.querySelectorAll('.waypoint .info.show');

        if (waypoint) {
            const waypointInfo = waypoint.querySelector('.info');
            if (!waypointInfo) return;
            waypointInfo.classList.toggle('show');

            openedInfos.forEach((info) => {
                if (info !== waypointInfo) info.classList.remove('show');
            });
        } else {
            openedInfos.forEach((info) => {
                info.classList.remove('show');
            });
        }
    });

    // ===== ZOOM / PANORAMA =====
    const baseZoom = 1.1;
    let zoomLevel = baseZoom;

    const minZoom = 0.6;
    const maxZoom = 2.5;
    const zoomStep = 0.1;

    const panorama = document.querySelector('.panorama');
    const wrapper = document.querySelector('.panorama-wrapper');
    const zoomLabel = document.getElementById('zoomLabel');

    // ===== MINIMAP SETUP =====
    const minimap = document.getElementById('minimap');
    const ctx = minimap.getContext('2d');

    // totale "wereld" = de complete panorama-breedte/hoogte
    function getWorldSize() {
        return {
            w: panorama.scrollWidth,
            h: panorama.scrollHeight
        };
    }

    // Gebruik de eerste panorama-afbeelding als bron voor de minimap
const panoSourceImg = document.querySelector('.panorama img');


    function drawMinimap() {
        const { w: worldW, h: worldH } = getWorldSize();
        if (!worldW || !worldH) return;

        const rect = minimap.getBoundingClientRect();
        const dpr = window.devicePixelRatio || 1;

        minimap.width = rect.width * dpr;
        minimap.height = rect.height * dpr;
        ctx.setTransform(dpr, 0, 0, dpr, 0, 0);

        const cw = rect.width;
        const ch = rect.height;

        ctx.clearRect(0, 0, cw, ch);

        // schaal zodat het hele panorama in de minimap past
        const s = Math.min(cw / worldW, ch / worldH);
        const drawW = worldW * s;
        const drawH = worldH * s;
        const offX = (cw - drawW) / 2;
        const offY = (ch - drawH) / 2;

        // achtergrond
        ctx.fillStyle = '#0a0f16';
        ctx.fillRect(0, 0, cw, ch);

// "wereld" = afbeelding gebaseerd op eerste panorama-foto
if (panoSourceImg && panoSourceImg.complete) {
    ctx.drawImage(panoSourceImg, offX, offY, drawW, drawH);
} else {
    // fallback: gekleurde balk als img nog niet geladen is
    ctx.fillStyle = '#1e293b';
    ctx.fillRect(offX, offY, drawW, drawH);
}

        // actuele viewport (wat je nu op scherm ziet)
        const viewW = wrapper.clientWidth / zoomLevel;
        const viewH = wrapper.clientHeight / zoomLevel;
        const viewX = wrapper.scrollLeft;
        const viewY = wrapper.scrollTop;

        const rx = offX + viewX * s;
        const ry = offY + viewY * s;
        const rw = viewW * s;
        const rh = viewH * s;

        // licht vlak van viewport
        ctx.fillStyle = 'rgba(255,255,255,0.15)';
        ctx.fillRect(rx, ry, rw, rh);

        // rand van viewport
        ctx.strokeStyle = '#5aa9ff';
        ctx.lineWidth = 2;
        ctx.strokeRect(rx + 1, ry + 1, rw - 2, rh - 2);
    }

    // apply zoom
    function applyZoom() {
        panorama.style.transformOrigin = '0 0';
        panorama.style.transform = `scale(${zoomLevel})`;
        updateZoomLabel();
        drawMinimap();
    }

    function updateZoomLabel() {
        if (!zoomLabel) return;
        zoomLabel.textContent = Math.round(zoomLevel * 100) + '%';
    }

    function zoomIn() {
        if (zoomLevel < maxZoom) {
            zoomLevel += zoomStep;
            applyZoom();
        }
    }

    function zoomOut() {
        if (zoomLevel > minZoom) {
            zoomLevel -= zoomStep;
            applyZoom();
        }
    }

    function resetZoom() {
        zoomLevel = baseZoom;
        applyZoom();
        wrapper.scrollLeft = 0;
        wrapper.scrollTop = 0;
        drawMinimap();
    }

    // ===== LETTERGROOTTES =====
    // function setFontSize(size) {
    //     const body = document.body;

    //     body.classList.remove('font-small', 'font-medium', 'font-large');

    //     if (size === 'small') {
    //         body.classList.add('font-small');
    //     } else if (size === 'medium') {
    //         body.classList.add('font-medium');
    //     } else if (size === 'large') {
    //         body.classList.add('font-large');
    //     }

    //     localStorage.setItem('fontSize', size);
    // }

    // document.getElementById('klein').addEventListener('click', function (e) {
    //     e.preventDefault();
    //     setFontSize('small');
    // });

    // document.getElementById('middel').addEventListener('click', function (e) {
    //     e.preventDefault();
    //     setFontSize('medium');
    // });

    // document.getElementById('groot').addEventListener('click', function (e) {
    //     e.preventDefault();
    //     setFontSize('large');
    // });

    // window.addEventListener('DOMContentLoaded', function () {
    //     const savedSize = localStorage.getItem('fontSize');
    //     if (savedSize) {
    //         setFontSize(savedSize);
    //     } else {
    //         setFontSize('medium');
    //     }
    // });

    // ===== MINIMAP INTERACTIE =====
    function minimapToWorld(e) {
        const rect = minimap.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        const { w: worldW, h: worldH } = getWorldSize();
        const cw = rect.width;
        const ch = rect.height;

        const s = Math.min(cw / worldW, ch / worldH);
        const drawW = worldW * s;
        const drawH = worldH * s;
        const offX = (cw - drawW) / 2;
        const offY = (ch - drawH) / 2;

        const wx = (x - offX) / s;
        const wy = (y - offY) / s;

        return {
            x: Math.max(0, Math.min(worldW, wx)),
            y: Math.max(0, Math.min(worldH, wy))
        };
    }

    minimap.addEventListener('mousedown', (e) => {
        e.preventDefault();
        const world = minimapToWorld(e);

        const viewW = wrapper.clientWidth / zoomLevel;
        const viewH = wrapper.clientHeight / zoomLevel;

        let targetX = world.x - viewW / 2;
        let targetY = world.y - viewH / 2;

        const { w: worldW, h: worldH } = getWorldSize();

        targetX = Math.max(0, Math.min(worldW - viewW, targetX));
        targetY = Math.max(0, Math.min(worldH - viewH, targetY));

        wrapper.scrollLeft = targetX;
        wrapper.scrollTop = targetY;

        drawMinimap();
    });

    minimap.addEventListener('wheel', (e) => {
        e.preventDefault();

        const world = minimapToWorld(e);
        const oldZoom = zoomLevel;
        const zoomInDirection = e.deltaY < 0;

        let newZoom = oldZoom * (zoomInDirection ? (1 + (zoomStep / oldZoom)) : (1 - (zoomStep / oldZoom)));
        newZoom = Math.max(minZoom, Math.min(maxZoom, newZoom));

        if (newZoom === oldZoom) return;

        const screenX = (world.x - wrapper.scrollLeft) * oldZoom;
        const screenY = (world.y - wrapper.scrollTop) * oldZoom;

        zoomLevel = newZoom;
        applyZoom();

        wrapper.scrollLeft = world.x - screenX / newZoom;
        wrapper.scrollTop = world.y - screenY / newZoom;

        drawMinimap();
    }, {
        passive: false
    });

    wrapper.addEventListener('scroll', drawMinimap);
    window.addEventListener('resize', drawMinimap);

    // alles initialiseren zodra de pagina klaar is
    window.addEventListener('load', () => {
        zoomLevel = baseZoom;
        applyZoom();
        wrapper.scrollLeft = 0;
        wrapper.scrollTop = 0;
        drawMinimap();
    });

    if (panoSourceImg && !panoSourceImg.complete) {
    panoSourceImg.addEventListener('load', drawMinimap);
}


    // maak zoom-functies global zodat de HTML-knoppen ze kunnen gebruiken
    window.zoomIn = zoomIn;
    window.zoomOut = zoomOut;
    window.resetZoom = resetZoom;
</script>


</body>