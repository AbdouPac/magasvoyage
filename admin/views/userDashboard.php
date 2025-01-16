<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit();
}

require '../models/configuration.php';

$sql = "SELECT * FROM contacts ORDER BY created_at DESC";
$stmt = $pdo->query($sql);
$contacts = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Magas Voyage</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>


        <div class="title">
            <h1>Tableau de bord <br> Données des Contacts</h1>
        </div>

        <div class="main-container">

        <!-- Conteneur pour les boutons -->
        <div class="btn-container">
            <div class="right-btn">
                <a href="../controllers/logout.php?logout=success" class="logout-btn">Déconnexion</a>
            </div>
        </div>

        <div class="accordion">
            <h2>Contacts</h2>
            <?php if ($contacts): ?>
                <?php foreach ($contacts as $contact): ?>
                    <button class="accordion-btn"><?= htmlspecialchars($contact['lastname']) ?> <?= htmlspecialchars($contact['firstname']) ?></button>
                    <div class="panel">
                        <p>Email : <?= htmlspecialchars($contact['email']) ?></p>
                        <p>Téléphone : <?= htmlspecialchars($contact['tel']) ?></p>
                        <p>Message : <?= nl2br(htmlspecialchars(wordwrap($contact['message'], 150, "\n", true))) ?></p>
                        <p>Date : <?= htmlspecialchars($contact['created_at']) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="empty">Aucune donnée disponible.</p>
            <?php endif; ?>
        </div>

    </div>



   <script>
    // Récupérer tous les boutons de l'accordéon
    const accordionButtons = document.querySelectorAll('.accordion-btn');

    // Ajouter un événement de clic à chaque bouton
    accordionButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Bascule de la classe active
            button.classList.toggle('active');

            // Récupérer le panneau suivant (panel)
            const panel = button.nextElementSibling;

            // Bascule de l'affichage du panel
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    });
</script>



</body>
</html>