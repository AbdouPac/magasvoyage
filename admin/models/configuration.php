<?php
// configuration.php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "magas_voyage";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Création de la table users si elle n'existe pas
    $pdo->exec("CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        password VARCHAR(255) NOT NULL,
        role VARCHAR(20) DEFAULT 'user',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB;");

    // Création de la table contacts si elle n'existe pas
    $pdo->exec("CREATE TABLE IF NOT EXISTS contacts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        lastname VARCHAR(100) NOT NULL,
        firstname VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        tel VARCHAR(20),
        message TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB;");

    // Insertion d'utilisateurs par défaut si la table est vide
    $stmt = $pdo->query("SELECT COUNT(*) FROM users");
    if ($stmt->fetchColumn() == 0) {
        $users = [
            ['username' => 'admin', 'password' => password_hash('Magas2025@.', PASSWORD_DEFAULT), 'role' => 'admin'],
            ['username' => 'user', 'password' => password_hash('user123', PASSWORD_DEFAULT), 'role' => 'user']
        ];

        $insertStmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (:username, :password, :role)");
        foreach ($users as $u) {
            $insertStmt->execute([
                ':username' => $u['username'],
                ':password' => $u['password'],
                ':role' => $u['role']
            ]);
        }
    }

} catch (PDOException $e) {
    error_log("Erreur de connexion : " . $e->getMessage());
    die("Une erreur est survenue lors de la connexion à la base de données.");
}
?>
