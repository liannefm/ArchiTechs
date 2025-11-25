<body>

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
    </div>
</div>

<!-- Page Content -->
<div class="hamburger_box">
  <button class="hamburger_menu" onclick="sidebar_open()">☰</button>
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