<?php
require_once 'config/connexion.php';

class Article {

    public static function getAllArticles() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM article ORDER BY dateCreation DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getArticlesByCategory($categorieId) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM article WHERE categorie = ? ORDER BY dateCreation DESC");
        $stmt->execute([$categorieId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getArticleById($articleId) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM article WHERE id = ?");
        $stmt->execute([$articleId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getCategoryName($categorieId) {
        global $pdo;
        if ($categorieId !== null) {
            $stmtCat = $pdo->prepare("SELECT libelle FROM categorie WHERE id = ?");
            $stmtCat->execute([$categorieId]);
            return $stmtCat->fetch(PDO::FETCH_ASSOC);
        }
        return ['libelle' => 'Toutes les catégories'];
    }
}
