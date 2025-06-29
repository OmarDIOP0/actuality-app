<?php
$host ='localhost';
$user = 'mglsi_user';
$password = 'passer';
$database = 'mglsi_news';

try{
    $pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Echec lors de la connexion: " . $e->getMessage();
}
?>