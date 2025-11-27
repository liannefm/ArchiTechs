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
                    <!-- hier komen de knoppen -->
                </div>
                <div id="sidebarbox">
                    <img src="includes/image/hualogo.png" id="imgsidebar" alt="hualogo">
                    <h2>Het Utrechts Archief</h2>
                </div>
                
                    <div id="lightmode">lightmode<label class="switch"><input type="checkbox"><span class="slider round"></span></label></div><br>
                    <div id="hotspot">hotspot<label class="switch"><input type="checkbox"><span class="slider round"></span></label></div>

                <button class="dropdown-btn">talen 
                    <i class="fas fa-chevron-down"></i>
                </button>

                <div class="dropdown-container">
                    <a href="#">Nederlands</a>
                    <a href="#">Engels</a>
                </div><br>

                <button class="dropdown-btn">tekstgrootte 
                    <i class="fas fa-chevron-down"></i>
                </button>

                <div class="dropdown-container">
                    <a href="#">klein</a>
                    <a href="#">middel</a>
                    <a href="#">groot</a>
                </div>

                <p>&copy; 2025 Het Utrechts Archief</p>
            </div>
        </div>
            <div id="topbar">
                <div class="hamburger_box">
                    <button class="hamburger_menu" onclick="sidebar_open()">☰</button>
                </div>
                <div id="titelbox">
                    <h1>De geschiedenis van Utrecht</h1>
                </div>
            </div>

        <div class="panorama">
            <img src="includes/image/1.jpg" alt="Panorama Image 1"
                style="height: 500px; z-index: 1; margin-left: 0px; margin-top: 0px;">
            <img src="includes/image/2.jpg" alt="Panorama Image 2"
                style="height: 500px; z-index: 2; margin-left: 0px; margin-top: 0px;">
            <img src="includes/image/3.jpg" alt="Panorama Image 3"
                style="height: 497.5px; z-index: 3; margin-left: -40px; margin-top: -1px;">
            <img src="includes/image/4.jpg" alt="Panorama Image 4"
                style="height: 500px; z-index: 4; margin-left: -43px; margin-top: -5px;">
            <img src="includes/image/5.jpg" alt="Panorama Image 5"
                style="height: 506px; z-index: 5; margin-left: -56px; margin-top: -8px;">
            <img src="includes/image/6.jpg" alt="Panorama Image 6"
                style="height: 511px; z-index: 6; margin-left: -60px; margin-top: -12px;">
            <img src="includes/image/7.jpg" alt="Panorama Image 7"
                style="height: 523px; z-index: 8; margin-left: -71px; margin-top: -13px;">
            <img src="includes/image/8.jpg" alt="Panorama Image 8"
                style="height: 502px; z-index: 7; margin-left: -44px; margin-top: -6px;">
            <img src="includes/image/9.jpg" alt="Panorama Image 9"
                style="height: 514px; z-index: 9; margin-left: -37px; margin-top: -12px;">
            <img src="includes/image/10.jpg" alt="Panorama Image 10"
                style="height: 511px; z-index: 10; margin-left: -44px; margin-top: -11px;">
            <img src="includes/image/11.jpg" alt="Panorama Image 11"
                style="height: 515px; z-index: 11; margin-left: -62px; margin-top: -13px;">
            <img src="includes/image/12.jpg" alt="Panorama Image 12"
                style="height: 518px; z-index: 12; margin-left: -60px; margin-top: -11px;">
            <img src="includes/image/13.jpg" alt="Panorama Image 13"
                style="height: 515.5px; z-index: 13; margin-left: -37px; margin-top: -11px;">
            <img src="includes/image/14.jpg" alt="Panorama Image 14"
                style="height: 509px; z-index: 14; margin-left: -45px; margin-top: -6px;">
            <img src="includes/image/15.jpg" alt="Panorama Image 15"
                style="height: 506px; z-index: 15; margin-left: -59px; margin-top: -4px;">
            <img src="includes/image/16.jpg" alt="Panorama Image 16"
                style="height: 505px; z-index: 16; margin-left: -54px; margin-top: 1px;">
            <img src="includes/image/17.jpg" alt="Panorama Image 17"
                style="height: 508px; z-index: 17; margin-left: -36px; margin-top: 1px;">
            <img src="includes/image/18.jpg" alt="Panorama Image 18"
                style="height: 515px; z-index: 18; margin-left: -40px; margin-top: 1.5px;">
            <img src="includes/image/19.jpg" alt="Panorama Image 19"
                style="height: 526px; z-index: 19; margin-left: -41px; margin-top: -3px;">
            <img src="includes/image/20.jpg" alt="Panorama Image 20"
                style="height: 534px; z-index: 21; margin-left: -38px; margin-top: -6px;">
            <img src="includes/image/21.jpg" alt="Panorama Image 21"
                style="height: 526px; z-index: 20; margin-left: -30px; margin-top: 7px;">
            <img src="includes/image/22.jpg" alt="Panorama Image 22"
                style="height: 542px; z-index: 22; margin-left: -43px; margin-top: -5px;">
            <img src="includes/image/23.jpg" alt="Panorama Image 23"
                style="height: 528px; z-index: 23; margin-left: -40px; margin-top: 2px;">
            <img src="includes/image/24.jpg" alt="Panorama Image 24"
                style="height: 506px; z-index: 24; margin-left: -34px; margin-top: 16px;">
            <img src="includes/image/25.jpg" alt="Panorama Image 25"
                style="height: 524px; z-index: 25; margin-left: -30px; margin-top: 1px;">
            <img src="includes/image/26.jpg" alt="Panorama Image 26"
                style="height: 510.5px; z-index: 26; margin-left: -35px; margin-top: 12px;">
            <img src="includes/image/27.jpg" alt="Panorama Image 27"
                style="height: 527px; z-index: 27; margin-left: -42px; margin-top: 5px;">
            <img src="includes/image/28.jpg" alt="Panorama Image 28"
                style="height: 540px; z-index: 28; margin-left: -48px; margin-top: -4px;">
            <img src="includes/image/29.jpg" alt="Panorama Image 29"
                style="height: 534px; z-index: 29; margin-left: -44px; margin-top: -1px;">
            <img src="includes/image/30.jpg" alt="Panorama Image 30"
                style="height: 531px; z-index: 30; margin-left: -53px; margin-top: 5px;">
            <img src="includes/image/31.jpg" alt="Panorama Image 31"
                style="height: 540px; z-index: 32; margin-left: -47px; margin-top: 1px;">
            <img src="includes/image/32.jpg" alt="Panorama Image 32"
                style="height: 535px; z-index: 31; margin-left: -48px; margin-top: -4px;">
            <img src="includes/image/33.jpg" alt="Panorama Image 33"
                style="height: 539px; z-index: 33; margin-left: -45px; margin-top: -2px;">
        </div>
    </div>


<script>
    function sidebar_open() {
        document.getElementById("mySidebar").style.display = "block";
    }

    function sidebar_close() {
        document.getElementById("mySidebar").style.display = "none";
    }

    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
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
</script>

</body>