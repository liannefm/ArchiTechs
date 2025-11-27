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

<!-- Page Content -->
<div class="topbarfix">
  <div class="hamburger_box">
    <button class="hamburger_menu" onclick="sidebar_open()">☰</button>
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

<script>
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