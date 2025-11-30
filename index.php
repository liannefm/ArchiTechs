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
                
                    <div id="lightmode"><span id="lichtmodus">lichtmodus</span><label class="switch"><input onChange="toggleDarkMode()" type="checkbox"><span class="slider round"></span></label></div><br>

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

                <p>&copy; 2025 Het Utrechts Archief</p>
            </div>
        </div>

        <div id="topbar">
            <div class="hamburger_box">
                <button class="hamburger_menu" onclick="sidebar_open()">☰</button>
            </div>
            <div id="titelbox">
                <h1 id="titelpagina">De geschiedenis van Utrecht</h1>
            </div>
        </div>

        <div class="panorama-wrapper" style="margin-top: 110px;">
            <div class="panorama">
            <img src="includes/image/panorama/1.jpg" alt="Panorama Image 1"
                style="height: 500px; z-index: 1; margin-left: 0px; margin-top: 0px;">
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
                <span style="font-size: 32px; color: white;">↺</span>
            </button>
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
        const darkModeTextElement = document.querySelector('#lichtmodus');

        element.classList.toggle("dark-mode");
        darkModeTextElement.textContent = element.classList.contains('dark-mode') ? 'donkere modus' : 'lichtmodus';
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
        if(selectedElement){
        selectedElement.innerText = value;
        }
    });
    }





let zoomLevel = 1;          // start op 100%
const minZoom = 0.6;        // minimale zoom
const maxZoom = 2.5;        // maximale zoom
const zoomStep = 0.1;       // hoeveel per klik

// Pak alle panorama-afbeeldingen
const panoramaImages = document.querySelectorAll('.panorama img');

// Sla de originele hoogte op (één keer)
panoramaImages.forEach(img => {
    img.dataset.baseHeight = img.clientHeight; // bijvoorbeeld 500px
});

function applyZoom() {
    panoramaImages.forEach(img => {
        const base = parseFloat(img.dataset.baseHeight);
        img.style.height = (base * zoomLevel) + 'px';
    });
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
    zoomLevel = 1;          // terug naar standaard
    applyZoom();            // hoogtes van de afbeeldingen resetten

    const wrapper = document.querySelector('.panorama-wrapper');
    wrapper.scrollLeft = 0; // terug naar begin van de panorama
    wrapper.scrollTop = 0;  // naar boven
    updateOverflow();       // overflow weer updaten (verticale scroll verbergen)
}

</script>

</body>