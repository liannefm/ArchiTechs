<?php
include("includes/connection.php");
include("includes/user_ingelogd.php");
include("includes/header.php");
include("includes/topbar_crud.php");


try {
    $stmt = $conn->prepare("SELECT id, pagina_foto, pagina_nummer, catalogusnummer, titel, beschrijving, opmerking, soort_negatief FROM panorama");
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

            $pagina_foto = $v['pagina_foto'];
            $pagina_nummer = $v['pagina_nummer'];
            $catalogusnummer = $v['catalogusnummer'];
            $titel = $v['titel'];
            $beschrijving = $v['beschrijving'];
            $opmerking = $v['opmerking'];
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
        <h2>Inhoud panorama Nl</h2>

        <form action="includes/update_panorama.php" method="POST">

            <div class="EditPanoramaBox">

                <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

                <div id="Invulvelden">

                    <?php echo "<p>Id: $id</p>" ?><br>

                    <div class="formulier-box">
                        <p>Pagina foto:</p>
                        <input type="tekst" id="pagina_foto" name="pagina_foto" value="<?= htmlspecialchars($pagina_foto) ?>">
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
                        <p>Pagina titel:</p>
                        <textarea id="pagina_titel" name="pagina_titel"><?= htmlspecialchars($titel) ?></textarea>
                    </div>

                    <div class="formulier-box">
                        <p>Beschrijving:</p>
                        <textarea id="beschrijving" name="beschrijving"><?= htmlspecialchars($beschrijving) ?></textarea>
                    </div>

                    <div class="formulier-box">
                        <p>opmerking:</p>
                        <textarea id="opmerking" name="opmerking"><?= htmlspecialchars($opmerking) ?></textarea>
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