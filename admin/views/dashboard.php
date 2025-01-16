<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit();
}

require '../models/configuration.php';

// Récupérer la liste des contacts
$sqlContacts = "SELECT * FROM contacts ORDER BY created_at DESC";
$stmtContacts = $pdo->query($sqlContacts);
$contacts = $stmtContacts->fetchAll();

// Récupérer la liste des utilisateurs (seulement pour l'admin)
$users = [];
if ($_SESSION['user']['role'] === 'admin') {
    $sqlUsers = "SELECT * FROM users WHERE role != 'admin' ORDER BY created_at DESC";
    $stmtUsers = $pdo->query($sqlUsers);
    $users = $stmtUsers->fetchAll();
}
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

        <!-- Affichage des contacts -->
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
                        <form action="../controllers/delete.php" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce contact ?');">
                            <input type="hidden" name="id" value="<?= $contact['id'] ?>">
                            <input type="hidden" name="type" value="contact">
                            <button type="submit" class="delete-btn">Supprimer</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="empty">Aucun contact disponible.</p>
            <?php endif; ?>
        </div>
    </div>

    <div class="main-container">

        <!-- Affichage des utilisateurs (visible uniquement par l'admin) -->
        <?php if ($_SESSION['user']['role'] === 'admin'): ?>
            <div class="accordion">
                <h2>Utilisateurs</h2>
                <?php if ($users): ?>
                    <?php foreach ($users as $user): ?>
                        <button class="accordion-btn"><?= htmlspecialchars($user['username']) ?> (<?= htmlspecialchars($user['role']) ?>)</button>
                        <div class="panel">
                            <p>ID : <?= htmlspecialchars($user['id']) ?></p>
                            <p>Nom d'utilisateur : <?= htmlspecialchars($user['username']) ?></p>
                            <p>Rôle : <?= htmlspecialchars($user['role']) ?></p>
                            <p>Date de création : <?= htmlspecialchars($user['created_at']) ?></p>
                            <?php if ($user['id'] != $_SESSION['user']['id']): ?>
                                <form action="../controllers/delete.php" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');">
                                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                    <input type="hidden" name="type" value="user">
                                    <button type="submit" class="delete-btn">Supprimer</button>
                                </form>
                            <?php else: ?>
                                <p><em>Vous ne pouvez pas supprimer votre propre compte.</em></p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="empty">Aucun utilisateur disponible.</p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    </div>

<script>
// Gestion de l'accordéon
const accordionButtons = document.querySelectorAll('.accordion-btn');
accordionButtons.forEach(button => {
    button.addEventListener('click', () => {
        button.classList.toggle('active');
        const panel = button.nextElementSibling;
        panel.style.display = (panel.style.display === "block") ? "none" : "block";
    });
});
</script>

</body>
</html>
