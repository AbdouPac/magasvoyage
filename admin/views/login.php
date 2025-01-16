<?php
// login.php
session_start();
require_once '../models/configuration.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Vérifier si les champs sont remplis
    if (!empty($pseudo) && !empty($password)) {
        // Préparer la requête pour vérifier l'utilisateur
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $pseudo]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifier si l'utilisateur existe et si le mot de passe est correct
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role']
            ];

            // Redirection en fonction du rôle
            if ($user['role'] === 'admin') {
                header('Location: dashboard.php');
            } elseif ($user['role'] === 'user') {
                header('Location: userDashboard.php');
            } else {
                session_destroy();
                header('Location: login.php?error=role');
            }
            exit();
        } else {
            $error = 'Identifiant ou mot de passe incorrect.';
        }
    } else {
        $error = 'Veuillez remplir tous les champs.';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/login.css">
    <title>Connexion</title>
</head>
<body>
<div class="main-container">
    <div class="connexion">
        <h2>Connexion</h2>
    </div>

    <div class="form">
        <?php if ($error): ?>
            <p style="color:red;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form method="post" action="">
            <label for="username">Identifiant :</label>
            <input type="text" name="username" id="username" required><br><br>
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" required><br><br>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</div>
</body>
</html>
