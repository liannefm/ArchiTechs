<?php
include("includes/connection.php");
include("includes/header.php");
include("includes/topbar_crud.php");
session_start();

// Check of ID is meegegeven
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "Geen geldig ID opgegeven.";
    exit;
}

$id = (int)$_GET['id'];

// Haal alleen het record op dat overeenkomt met de ID
try {
    $stmt = $conn->prepare("SELECT * FROM panorama WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$data) {
        echo "Geen resultaat gevonden.";
        exit;
    }
} catch (PDOException $e) {
    echo "Database fout: " . $e->getMessage();
    exit;
}

?>

<body>
    <div id="container">

        <h1>Panorama ID: <?php echo htmlspecialchars($id); ?></h1>

        <!-- Afbeelding bovenaan -->
        <div style="margin-bottom: 30px;">
            <?php if (!empty($data['pagina_foto'])): ?>
                <img src="<?php echo htmlspecialchars($data['pagina_foto']); ?>"
                    alt="Panorama afbeelding"
                    style="max-width: 450px; border: 1px solid #ccc; display: block;">
            <?php else: ?>
                <p>Geen afbeelding beschikbaar.</p>
            <?php endif; ?>
        </div>

        <!-- Alle data velden onder elkaar -->
        <div>
            <?php foreach ($data as $veld => $waarde): ?>
                <?php if ($veld === "pagina_foto") continue; // afbeelding al getoond 
                ?>

                <div style="margin-bottom: 15px; padding-bottom: 10px; border-bottom: 1px solid #eee;">
                    <strong><?php echo htmlspecialchars($veld); ?>:</strong><br>
                    <?php
                    if ($waarde === null || $waarde === "") {
                        echo "<em>Geen gegevens</em>";
                    } else {
                        echo nl2br(htmlspecialchars($waarde));
                    }
                    ?>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</body>

</html>