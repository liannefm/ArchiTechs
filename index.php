<?php
include("includes/header.php");
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

                <div id="hotspot">hotspot<label class="switch"><input type="checkbox"><span class="slider round"></span></label></div>

                <button class="dropdown-btn">
                    <span id="talen">talen</span>
                    <i class="fas fa-chevron-right"></i>
                </button>


                <div class="dropdown-container">

                    <a href="#"><img src="includes/image/flags/netherlands.svg"> <button onclick="setLanguage('nl')" id="talenknopnl">Nederlands</button></a>
                    <a href="#"><img src="includes/image/flags/united-kingdom.svg"> <button onclick="setLanguage('en')" id="talenknopen">Engels</button></a>
                </div><br>

                <button class="dropdown-btn">
                    <span id="tekstgrootte">tekstgrootte</span>
                    <i class="fas fa-chevron-right"></i>
                </button>

                <div class="dropdown-container">
                    <a href="#" id="klein">klein</a>
                    <a href="#" id="middel">middel</a>
                    <a href="#" id="groot">groot</a>
                </div>

                <div class="toolbar">
                    <button id="fit" class="btn" title="Pas afbeelding in het scherm">Fit</button>
                    <button id="reset" class="btn" title="Reset positie en zoom">Reset</button>
                    <span class="badge" id="zoomLabel">100%</span>
                </div>

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
                    <img src="includes/image/panorama/1.jpg" alt="Panorama Image 1"
                        style="height: 500px; z-index: 1; margin-left:  0px; margin-top: 0px;">

                    <div class="waypoint" style="top: 180px; left: 120px;">
                        <span><i class="fa-solid fa-question"></i></span>
                        <div class="info">
                            <p>Het Panorama van Utrecht bestaat uit vier aaneengeplakte, zigzag gevouwen bladen met een totale lengte van 5,82 meter. Het panorama is een meterslange tekening van een rondwandeling om het centrum van Utrecht,met steeds wisselend uitzicht vanaf de singels. Het geeft een heel precies beeld van hoe de stad in 1859 er uitzag en het leuke is dat je ook het verloop van de seizoenen in de tekening terugziet.</p>
                        </div>
                    </div>

                    <img src="includes/image/panorama/2.jpg" alt="Panorama Image 2"
                        style="height: 500px; z-index: 2; margin-left: 0px; margin-top: 0px;">
                    <img src="includes/image/panorama/3.jpg" alt="Panorama Image 3"
                        style="height: 497.5px; z-index: 3; margin-left: -40px; margin-top: -1px;">
                    <img src="includes/image/panorama/4.jpg" alt="Panorama Image 4"
                        style="height: 500px; z-index: 4; margin-left: -43px; margin-top: -5px;">
                    <img src="includes/image/panorama/5.jpg" alt="Panorama Image 5"
                        style="height: 506px; z-index: 5; margin-left: -56px; margin-top: -8px;">
                    <img src="includes/image/panorama/6.jpg" alt="Panorama Image 6"
                        style="height: 511px; z-index: 6; margin-left: -60px; margin-top: -12px;">
                    <img src="includes/image/panorama/7.jpg" alt="Panorama Image 7"
                        style="height: 523px; z-index: 8; margin-left: -71px; margin-top: -13px;">
                    <img src="includes/image/panorama/8.jpg" alt="Panorama Image 8"
                        style="height: 502px; z-index: 7; margin-left: -44px; margin-top: -6px;">
                    <img src="includes/image/panorama/9.jpg" alt="Panorama Image 9"
                        style="height: 514px; z-index: 9; margin-left: -37px; margin-top: -12px;">
                    <img src="includes/image/panorama/10.jpg" alt="Panorama Image 10"
                        style="height: 511px; z-index: 10; margin-left: -44px; margin-top: -11px;">
                    <img src="includes/image/panorama/11.jpg" alt="Panorama Image 11"
                        style="height: 515px; z-index: 11; margin-left: -62px; margin-top: -13px;">
                    <img src="includes/image/panorama/12.jpg" alt="Panorama Image 12"
                        style="height: 518px; z-index: 12; margin-left: -60px; margin-top: -11px;">
                    <img src="includes/image/panorama/13.jpg" alt="Panorama Image 13"
                        style="height: 515.5px; z-index: 13; margin-left: -37px; margin-top: -11px;">
                    <img src="includes/image/panorama/14.jpg" alt="Panorama Image 14"
                        style="height: 509px; z-index: 14; margin-left: -45px; margin-top: -6px;">
                    <img src="includes/image/panorama/15.jpg" alt="Panorama Image 15"
                        style="height: 506px; z-index: 15; margin-left: -59px; margin-top: -4px;">
                    <img src="includes/image/panorama/16.jpg" alt="Panorama Image 16"
                        style="height: 505px; z-index: 16; margin-left: -54px; margin-top: 1px;">
                    <img src="includes/image/panorama/17.jpg" alt="Panorama Image 17"
                        style="height: 508px; z-index: 17; margin-left: -36px; margin-top: 1px;">
                    <img src="includes/image/panorama/18.jpg" alt="Panorama Image 18"
                        style="height: 515px; z-index: 18; margin-left: -40px; margin-top: 1.5px;">
                    <img src="includes/image/panorama/19.jpg" alt="Panorama Image 19"
                        style="height: 526px; z-index: 19; margin-left: -41px; margin-top: -3px;">
                    <img src="includes/image/panorama/20.jpg" alt="Panorama Image 20"
                        style="height: 534px; z-index: 21; margin-left: -38px; margin-top: -6px;">
                    <img src="includes/image/panorama/21.jpg" alt="Panorama Image 21"
                        style="height: 526px; z-index: 20; margin-left: -30px; margin-top: 7px;">
                    <img src="includes/image/panorama/22.jpg" alt="Panorama Image 22"
                        style="height: 542px; z-index: 22; margin-left: -43px; margin-top: -5px;">
                    <img src="includes/image/panorama/23.jpg" alt="Panorama Image 23"
                        style="height: 528px; z-index: 23; margin-left: -40px; margin-top: 2px;">
                    <img src="includes/image/panorama/24.jpg" alt="Panorama Image 24"
                        style="height: 506px; z-index: 24; margin-left: -34px; margin-top: 16px;">
                    <img src="includes/image/panorama/25.jpg" alt="Panorama Image 25"
                        style="height: 524px; z-index: 25; margin-left: -30px; margin-top: 1px;">
                    <img src="includes/image/panorama/26.jpg" alt="Panorama Image 26"
                        style="height: 510.5px; z-index: 26; margin-left: -35px; margin-top: 12px;">
                    <img src="includes/image/panorama/27.jpg" alt="Panorama Image 27"
                        style="height: 527px; z-index: 27; margin-left: -42px; margin-top: 5px;">
                    <img src="includes/image/panorama/28.jpg" alt="Panorama Image 28"
                        style="height: 540px; z-index: 28; margin-left: -48px; margin-top: -4px;">
                    <img src="includes/image/panorama/29.jpg" alt="Panorama Image 29"
                        style="height: 534px; z-index: 29; margin-left: -44px; margin-top: -1px;">
                    <img src="includes/image/panorama/30.jpg" alt="Panorama Image 30"
                        style="height: 531px; z-index: 30; margin-left: -53px; margin-top: 5px;">
                    <img src="includes/image/panorama/31.jpg" alt="Panorama Image 31"
                        style="height: 540px; z-index: 32; margin-left: -47px; margin-top: 1px;">
                    <img src="includes/image/panorama/32.jpg" alt="Panorama Image 32"
                        style="height: 535px; z-index: 31; margin-left: -48px; margin-top: -4px;">
                    <img src="includes/image/panorama/33.jpg" alt="Panorama Image 33"
                        style="height: 539px; z-index: 33; margin-left: -45px; margin-top: -2px;">

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

        panoramaContainer.addEventListener('click', function(e) {
            const waypoint = e.target.closest('.waypoint');
            const openedInfos = panoramaContainer.querySelectorAll('.waypoint .info.show');

            console.log('1');
            if (waypoint) {
                console.log('2');
                const waypointInfo = waypoint.querySelector('.info');
                if (!waypointInfo) return;
                console.log('3');
                waypointInfo.classList.toggle('show');

                openedInfos.forEach((info) => {
                    if (info !== waypointInfo) info.classList.remove('show');
                });
            } else {
                console.log('4');
                openedInfos.forEach((info) => {
                    info.classList.remove('show');
                });
            }

        });


        const baseZoom = 1.1;
        let zoomLevel = baseZoom;

        const minZoom = 0.6;
        const maxZoom = 2.5;
        const zoomStep = 0.1;

        const panorama = document.querySelector('.panorama');
        const wrapper = document.querySelector('.panorama-wrapper');

        const zoomLabel = document.getElementById('zoomLabel');

        // apply zoom
        function applyZoom() {
            panorama.style.transformOrigin = '0 0';
            panorama.style.transform = `scale(${zoomLevel})`;
            updateZoomLabel();
            drawMinimap(); // <— altijd minimap updaten na zoom
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

        // startwaarde
        applyZoom();




        // lettergroottes
        function setFontSize(size) {
            const body = document.body;

            body.classList.remove('font-small', 'font-medium', 'font-large');

            if (size === 'small') {
                body.classList.add('font-small');
            } else if (size === 'medium') {
                body.classList.add('font-medium');
            } else if (size === 'large') {
                body.classList.add('font-large');
            }

            localStorage.setItem('fontSize', size);
        }

        document.getElementById('klein').addEventListener('click', function(e) {
            e.preventDefault();
            setFontSize('small');
        });

        document.getElementById('middel').addEventListener('click', function(e) {
            e.preventDefault();
            setFontSize('medium');
        });

        document.getElementById('groot').addEventListener('click', function(e) {
            e.preventDefault();
            setFontSize('large');
        });

        window.addEventListener('DOMContentLoaded', function() {
            const savedSize = localStorage.getItem('fontSize');
            if (savedSize) {
                setFontSize(savedSize);
            } else {
                setFontSize('medium');
            }
        });






        function drawMinimap() {
            const {
                w: worldW,
                h: worldH
            } = getWorldSize();
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

            // volledige panorama-rechthoek
            ctx.fillStyle = '#1e293b';
            ctx.fillRect(offX, offY, drawW, drawH);

            // huidige viewport (wat je op het scherm ziet)
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

        // helper: muispositie -> wereld-coords
        function minimapToWorld(e) {
            const rect = minimap.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const {
                w: worldW,
                h: worldH
            } = getWorldSize();
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

        // klik in minimap -> panorama verplaatsen
        minimap.addEventListener('mousedown', (e) => {
            e.preventDefault();
            const world = minimapToWorld(e);

            const viewW = wrapper.clientWidth / zoomLevel;
            const viewH = wrapper.clientHeight / zoomLevel;

            // center op klikpunt
            let targetX = world.x - viewW / 2;
            let targetY = world.y - viewH / 2;

            const {
                w: worldW,
                h: worldH
            } = getWorldSize();

            targetX = Math.max(0, Math.min(worldW - viewW, targetX));
            targetY = Math.max(0, Math.min(worldH - viewH, targetY));

            wrapper.scrollLeft = targetX;
            wrapper.scrollTop = targetY;

            drawMinimap();
        });

        // scrollwiel op minimap -> zoom rond cursor
        minimap.addEventListener('wheel', (e) => {
            e.preventDefault();

            const world = minimapToWorld(e);
            const oldZoom = zoomLevel;
            const zoomIn = e.deltaY < 0;

            let newZoom = oldZoom * (zoomIn ? (1 + (zoomStep / oldZoom)) : (1 - (zoomStep / oldZoom)));
            newZoom = Math.max(minZoom, Math.min(maxZoom, newZoom));

            if (newZoom === oldZoom) return;

            // waar zit dit wereldpunt nu op het scherm?
            const screenX = (world.x - wrapper.scrollLeft) * oldZoom;
            const screenY = (world.y - wrapper.scrollTop) * oldZoom;

            zoomLevel = newZoom;
            applyZoom(); // tekent ook minimap

            // nieuwe scroll zodat het punt ongeveer op dezelfde plek blijft
            wrapper.scrollLeft = world.x - screenX / newZoom;
            wrapper.scrollTop = world.y - screenY / newZoom;

            drawMinimap();
        }, {
            passive: false
        });

        // bij scrollen van het panorama ook minimap updaten
        wrapper.addEventListener('scroll', drawMinimap);

        // bij resize
        window.addEventListener('resize', drawMinimap);

        // initialiseren zodra alles geladen is
        window.addEventListener('load', () => {
            applyZoom();
            wrapper.scrollLeft = 0;
            wrapper.scrollTop = 0;
            drawMinimap();
        });
    </script>

</body>