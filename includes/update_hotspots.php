<?php
session_start();

include("connection.php");
include("user_ingelogd.php");

$ids   = $_POST['hotspot_id']    ?? [];
$tops  = $_POST['waypoint_top']  ?? [];
$lefts = $_POST['waypoint_left'] ?? [];
$paginaId = isset($_POST['pagina_id']) ? (int)$_POST['pagina_id'] : null;

// Zorg dat het arrays zijn
if (!is_array($ids) || !is_array($tops) || !is_array($lefts)) {
    die("Ongeldige data ontvangen.");
}

// als er geen hotspot is ga je terug
if (count($ids) === 0) {
    if ($paginaId) {
        header("Location: ../crud_hotspots.php?id=" . $paginaId);
    } else {
        header("Location: ../crud_home.php");
    }
    exit;
}

try {
    $stmt = $conn->prepare("
        UPDATE extra_info
        SET waypoint_top = :top,
            waypoint_left = :left
        WHERE id = :id
    ");

    for ($i = 0; $i < count($ids); $i++) {
        $id   = (int)$ids[$i];
        $top  = (int)$tops[$i];
        $left = (int)$lefts[$i];

        $stmt->execute([
            ':top'  => $top,
            ':left' => $left,
            ':id'   => $id
        ]);
    }

    header("Location: ../crud_home.php");
    exit();
} catch (PDOException $e) {
    echo "Database-fout: " . $e->getMessage();
    exit;
}
