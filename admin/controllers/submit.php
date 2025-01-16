<?php
require '../models/configuration.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lastname = htmlspecialchars($_POST['lastname']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $email = htmlspecialchars($_POST['email']);
    $tel = htmlspecialchars($_POST['tel']);
    $message = htmlspecialchars($_POST['message']);

    if (!empty($lastname) && !empty($firstname)  && !empty($email) && !empty($tel) && !empty($message)) {
        $sql = "INSERT IGNORE INTO contacts (lastname, firstname, email, tel, message) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$lastname, $firstname, $email, $tel, $message]);

        header("Location: ../../index.php");
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}
?>
