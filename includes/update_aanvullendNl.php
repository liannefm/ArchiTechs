<?php
include("connection.php");

$id = $_POST['id'];
$foto = $_POST['foto'];
$pagina_nummer = $_POST['pagina_nummer'];
$catalogusnummer = $_POST['catalogusnummer'];
$aanvullende_info = $_POST['aanvullende_info'];
$soort_beeldmateriaal = $_POST['soort_beeldmateriaal'];
$soort_negatief = $_POST['soort_negatief'];

try {

    $sql = "UPDATE `extra_info` SET 
        foto=:foto,
        pagina_nummer=:pagina_nummer,
        catalogusnummer=:catalogusnummer,
        aanvullende_info=:aanvullende_info,
        soort_beeldmateriaal=:soort_beeldmateriaal,
        soort_negatief=:soort_negatief
        WHERE id = :id";

    $stmt = $conn->prepare($sql);

    // koppelt de variable met een $ aan de variable voor in sql met :

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':foto', $foto);
    $stmt->bindParam(':pagina_nummer', $pagina_nummer);
    $stmt->bindParam(':catalogusnummer', $catalogusnummer);
    $stmt->bindParam(':aanvullende_info', $aanvullende_info);
    $stmt->bindParam(':soort_beeldmateriaal', $soort_beeldmateriaal);
    $stmt->bindParam(':soort_negatief', $soort_negatief);


    // voert het stukje sql code uit
    $stmt->execute();

    header("Location: ../crud_home.php?save=succes");
    exit();
} catch (PDOException $e) {
    echo "Fout bij invoegen: " . $e->getMessage();
}
