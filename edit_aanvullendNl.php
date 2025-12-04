<?php
include("includes/connection.php");
include("includes/user_ingelogd.php");
include("includes/header.php");
include("includes/topbar_crud.php");


try {
    $stmt = $conn->prepare("SELECT id, foto, pagina_nummer, catalogusnummer, aanvullende_info, soort_beeldmateriaal, soort_negatief FROM extra_info");
    $stmt->execute();
    $Informatie = $stmt->fetchAll(); // Resultaten één keer ophalen

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}

if (isset($_GET['id'])) {

    foreach ($Informatie as $v) {

        if ($_GET['id'] == $v['id']) {
            $id = $v['id'];

            $foto = $v['foto'];
            $pagina_nummer = $v['pagina_nummer'];
            $catalogusnummer = $v['catalogusnummer'];
            $aanvullende_info = $v['aanvullende_info'];
            $soort_beeldmateriaal = $v['soort_beeldmateriaal'];
            $soort_negatief = $v['soort_negatief'];
        }
    }
} else {
    echo "Info niet gevonden";
    exit;
}

?>

<body>

    <div id="achtergrondEditPanorama">
        <h2>Inhoud aanvullend Nl</h2>

        <form action="includes/update_aanvullendNl.php" method="POST">

            <div class="EditPanoramaBox">

                <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

                <div id="Invulvelden">

                    <?php echo "<p>Id: $id</p>" ?><br>

                    <div class="formulier-box">
                        <p>Pagina foto:</p>
                        <input type="tekst" id="foto" name="foto" value="<?= htmlspecialchars($foto) ?>">
                    </div>


                    <div class="formulier-box">
                        <p>Pagina nummer:</p>
                        <input type="number" id="pagina_nummer" name="pagina_nummer" value="<?= htmlspecialchars($pagina_nummer) ?>">
                    </div>

                    <div class=" formulier-box">
                        <p>Catalogusnummer: </p>
                        <input type="number" id="catalogusnummer" name="catalogusnummer" value="<?= htmlspecialchars($catalogusnummer) ?>">
                    </div>

                    <div class="formulier-box">
                        <p>aanvullende_info:</p>
                        <textarea id="aanvullende_info" name="aanvullende_info"><?= htmlspecialchars($aanvullende_info) ?></textarea>
                    </div>

                    <div class="formulier-box">
                        <p>soort_beeldmateriaal:</p>
                        <textarea id="soort_beeldmateriaal" name="soort_beeldmateriaal"><?= htmlspecialchars($soort_beeldmateriaal) ?></textarea>
                    </div>

                    <div class="formulier-box">
                        <p>Soort negatief:</p>
                        <textarea id="soort_negatief" name="soort_negatief"><?= htmlspecialchars($soort_negatief) ?></textarea>
                    </div>

                    <br>
                    <button type="submit" id="SubmitKnop" name="SubmitKnop">Opslaan</button>
                </div>
            </div>
        </form>
    </div>

</body>