<?php
require_once 'config/connexion.php';

class Categorie {

    public function __construct() {
    }

    public static function getAllCategories() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM categorie");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getCategoryById($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM categorie WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>