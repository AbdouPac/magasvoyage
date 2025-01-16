<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../views/login.php');
    exit();
}

require '../models/configuration.php';

// Vérifier si l'utilisateur connecté est un administrateur
$isAdmin = ($_SESSION['user']['role'] === 'admin');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['type'])) {
    $id = intval($_POST['id']);
    $type = $_POST['type'];

    if ($type === 'contact') {
        // Suppression d'un contact
        $sql = "DELETE FROM contacts WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header('Location: ../views/dashboard.php?message=Contact supprimé');
            exit();
        } else {
            echo "Erreur lors de la suppression du contact.";
        }

    } elseif ($type === 'user' && $isAdmin) {
        // Empêcher un admin de se supprimer lui-même
        if ($id == $_SESSION['user']['id']) {
            echo "Vous ne pouvez pas supprimer votre propre compte.";
            exit();
        }

        // Suppression d'un utilisateur
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header('Location: ../views/dashboard.php?message=Utilisateur supprimé');
            exit();
        } else {
            echo "Erreur lors de la suppression de l'utilisateur.";
        }

    } else {
        echo "Action non autorisée.";
    }

} else {
    header('Location: ../views/dashboard.php');
    exit();
}
?>
