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
            <button class="crud_dropdown_btn">
                <i class="fas fa-chevron-right"></i>
                <span id="tekstgrootte">Home pagina</span>
            </button>
        </a>

        <div class="crud_dropdown_box">
            <button class="crud_dropdown_btn">
                <i class="fas fa-chevron-right"></i>
                <span id="tekstgrootte">Nederlands opties</span>
            </button>

            <div class="crud_dropdown_container">
                <a href="crud_home.php" id="NaarPanoramaNl">panorama pagina's</a>
                <a href="crud_home.php" id="NaarAanvullendNl">aanvullende pagina's</a>
            </div>
        </div>

        <a href="#" id="NaarPanoramaEn">
            <div class="KnoppenBox">
                Engels opties
            </div>
        </a>

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