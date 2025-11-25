<body>

<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
    <div id="sidebar">
        <div id="sidebarbox">
    <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
        <!-- hier komen de knoppen -->
        </div>
    </div>
</div>

<!-- Page Content -->
<div class="w3-teal">
  <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
  <div class="w3-container">
    <h1>My Page</h1>
  </div>
</div>

<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>    

</body>