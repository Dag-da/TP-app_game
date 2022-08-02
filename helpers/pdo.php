<?php
$server = "localhost";
$dbname = "app_game";
$login = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$server;dbname=$dbname", $login, $password, array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        // Ne pas récupérer les éléments en dupliqués
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        // Pour afficher les erreurs
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    ));
    // afficher message ok connexion
    echo "Connexion établie";
} catch (PDOException $e) {
    echo "Erreur de connexion :". $e->getMessage();
}