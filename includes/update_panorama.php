<?php
include("connection.php");

$id = $_POST['id'];
$pagina_nummer = $_POST['pagina_nummer'];
$catalogusnummer = $_POST['catalogusnummer'];
$titel = $_POST['pagina_titel'];
$beschrijving = $_POST['beschrijving'];
$opmerking = $_POST['opmerking'];
$soort_negatief = $_POST['soort_negatief'];
$oude_pagina_foto = $_POST['oude_pagina_foto'];

// standaard: gebruik oude foto
$pagina_foto = $oude_pagina_foto;

if (isset($_FILES['pagina_foto']) && $_FILES['pagina_foto']['error'] === UPLOAD_ERR_OK) {

    $uploadDir = '../includes/image/panorama/'; // map waar de foto in komt

    $tmpName = $_FILES['pagina_foto']['tmp_name'];
    $originalName = $_FILES['pagina_foto']['name'];

    // Extensie bepalen (jpg, png, etc.)
    $extensie = pathinfo($originalName, PATHINFO_EXTENSION);

    $customName = trim($_POST['bestandsnaam']);

    if ($customName === "") {
        echo "Je moet een bestandsnaam invoeren";
        exit;
    }

    // Nieuwe bestandsnaam opbouwen
    $newFileName = $customName . "." . $extensie;
    $destination = $uploadDir . $newFileName;

    // checkt of de bestandsnaam al bestaat
    if (file_exists($destination)) {
        echo "Fout: De bestandsnaam <strong>$newFileName</strong> bestaat al. Kies een andere naam.";
        exit;
    }

    // Foto verplaatsen naar de map
    if (move_uploaded_file($tmpName, $destination)) {
        $pagina_foto = 'includes/image/panorama/' . $newFileName;
    } else {
        echo "Fout bij uploaden van foto!";
        exit;
    }
}

try {
    $sql = "UPDATE panorama SET
        pagina_foto = :pagina_foto,
        pagina_nummer = :pagina_nummer,
        catalogusnummer = :catalogusnummer,
        titel = :titel,
        beschrijving = :beschrijving,
        opmerking = :opmerking,
        soort_negatief = :soort_negatief
    WHERE id = :id";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':pagina_foto', $pagina_foto);
    $stmt->bindParam(':pagina_nummer', $pagina_nummer);
    $stmt->bindParam(':catalogusnummer', $catalogusnummer);
    $stmt->bindParam(':titel', $titel);
    $stmt->bindParam(':beschrijving', $beschrijving);
    $stmt->bindParam(':opmerking', $opmerking);
    $stmt->bindParam(':soort_negatief', $soort_negatief);

    $stmt->execute();

    header("Location: ../crud_home.php?save=succes");
    exit();
} catch (PDOException $e) {
    echo "Fout bij updaten: " . htmlspecialchars($e->getMessage());
}
