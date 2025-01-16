<?php
session_start();
require_once '../models/configuration.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = isset($_POST['pseudo']) ? trim(htmlspecialchars($_POST['pseudo'])) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

    // Validation des champs
    if (empty($username) || empty($password) || empty($confirm_password)) {
        $error = 'Tous les champs sont obligatoires.';
    } elseif ($password !== $confirm_password) {
        $error = 'Les mots de passe ne correspondent pas.';
    } else {
        // Vérifier si le username existe déjà
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);

        if ($stmt->fetch()) {
            $error = 'Ce nom d\'utilisateur est déjà utilisé.';
        } else {
            // Insertion dans la base de données
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (:username, :password, 'user')");

            if ($stmt->execute(['username' => $username, 'password' => $hashed_password])) {
                $success = 'Compte créé avec succès ! Vous pouvez maintenant vous connecter.';
                header('Refresh: 2; URL=login.php');
                exit();
            } else {
                $error = 'Erreur lors de la création du compte.';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>

<div class="main-container">
    <div class="connexion">
        <h2>Inscription</h2>
    </div>

    <div class="form">
        <?php if (!empty($error)): ?>
            <p style="color:red;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <p style="color:green;"><?= htmlspecialchars($success) ?></p>
        <?php endif; ?>

        <form method="post" action="">
            <label for="pseudo">Identifiant :</label>
            <input type="text" name="pseudo" id="pseudo" required><br><br>

            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" required><br><br>

            <label for="confirm_password">Confirmer le mot de passe :</label>
            <input type="password" name="confirm_password" id="confirm_password" required><br><br>

            <button type="submit">S'inscrire</button>
        </form>

        <p>Déjà un compte ? <a href="login.php">Se connecter</a></p>
    </div>
</div>

</body>
</html>
