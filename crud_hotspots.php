<?php
session_start();

include("includes/connection.php");
include("includes/user_ingelogd.php");
include("includes/header.php");
include("includes/topbar_crud.php");

if (!isset($_SESSION['user'])) {
    header("location: inlog.php");
    exit;
}

// 1. Check of er een id is meegegeven in de URL
if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    echo "Ongeldige pagina ID.";
    exit;
}

$paginaId = (int)$_GET['id'];

try {
    $stmt = $conn->prepare("
        SELECT 
            id,
            pagina_foto,
            pagina_nummer,
            titel,
            img_height,
            img_margin_left,
            img_margin_top,
            img_z_index
        FROM panorama
        WHERE id = :id
        LIMIT 1
    ");
    $stmt->execute([':id' => $paginaId]);
    $panorama = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Database-fout: " . $e->getMessage();
    exit;
}

$paginaNummer = (int)$panorama['pagina_nummer'];
$paginaFoto   = str_replace('\\', '/', $panorama['pagina_foto']);
$titel        = $panorama['titel'] ?? '';

// zelfde layout als index:
$imgHeight    = $panorama['img_height']      ?? 500;
$imgMarginLeft = $panorama['img_margin_left'] ?? 0;
$imgMarginTop = $panorama['img_margin_top']  ?? 0;

// 4. Haal alle hotspots van deze pagina op
try {
    $stmt2 = $conn->prepare("
        SELECT id, waypoint_top, waypoint_left, aanvullende_info
        FROM extra_info 
        WHERE pagina_nummer = :nr
    ");
    $stmt2->execute([':nr' => $paginaNummer]);
    $hotspots = $stmt2->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Database-fout: " . $e->getMessage();
    exit;
}
?>

<body>

    <div id="achtergrondEditPanorama">
        <h2>Hotspots bewerken — pagina <?= htmlspecialchars($paginaNummer) ?></h2>

        <form id="hotspotForm" action="includes/update_hotspots.php" method="POST">
            <div class="EdithotspotsBox">
                <div id="Invulvelden">
                    <h3>Pagina nummer: <?= htmlspecialchars($paginaNummer) ?></h3>
                    <br>
                    <p>Sleep de hotspots naar de juiste plek en klik dan op opslaan.</p>
                    <br>

                    <div style="position:relative; display:inline-block; border:3px solid #247065; margin-bottom:20px;">
                        <img src="<?= htmlspecialchars($paginaFoto) ?>"
                            id="panoramaBg"
                            style="
                                 height: <?= htmlspecialchars($imgHeight); ?>px;
                                 margin-left: <?= htmlspecialchars($imgMarginLeft); ?>px;
                                 margin-top: <?= htmlspecialchars($imgMarginTop); ?>px;
                                 display:block;
                             ">

                        <?php foreach ($hotspots as $h): ?>
                            <div class="hotspot"
                                data-id="<?= $h['id'] ?>"
                                style="
                                    position:absolute;
                                    top:<?= (int)$h['waypoint_top'] ?>px;
                                    left:<?= (int)$h['waypoint_left'] ?>px;
                                    width:50px;
                                    height:50px;
                                    background:#287464;
                                    border-radius:50%;
                                    display:flex;
                                    justify-content:center;
                                    align-items:center;
                                    color:white;
                                    font-size:22px;
                                    cursor:grab;
                                ">
                                ?
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div id="hotspotHiddenInputs"></div>

                    <input type="hidden" name="pagina_id" value="<?= htmlspecialchars($paginaId) ?>">

                    <br>
                    <button type="submit" id="HotspotSubmitKnop" name="HotspotSubmitKnop">Hotspots opslaan</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        // hotspots sleepbaar maken
        document.querySelectorAll('.hotspot').forEach(h => {
            let offsetX, offsetY;

            h.onmousedown = e => {
                h.style.cursor = "grabbing";
                offsetX = e.offsetX;
                offsetY = e.offsetY;

                document.onmousemove = moveEvent => {
                    const parent = h.parentElement;
                    const rect = parent.getBoundingClientRect();

                    h.style.left = (moveEvent.clientX - rect.left - offsetX) + "px";
                    h.style.top = (moveEvent.clientY - rect.top - offsetY) + "px";
                };

                document.onmouseup = () => {
                    document.onmousemove = null;
                    h.style.cursor = "grab";
                };
            };
        });

        const hotspotForm = document.getElementById("hotspotForm");

        hotspotForm.addEventListener("submit", () => {
            const container = document.getElementById("hotspotHiddenInputs");
            container.innerHTML = "";

            document.querySelectorAll(".hotspot").forEach(h => {
                const id = h.dataset.id;
                const top = parseInt(h.style.top);
                const left = parseInt(h.style.left);

                container.innerHTML += `
                    <input type="hidden" name="hotspot_id[]" value="${id}">
                    <input type="hidden" name="waypoint_top[]" value="${top}">
                    <input type="hidden" name="waypoint_left[]" value="${left}">
                `;
            });
        });
    </script>

</body>