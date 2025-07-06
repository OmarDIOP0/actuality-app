<?php
 require_once 'connexion.php';

 class Article{
        private $pdo;
    
        public function __construct($pdo) {
            $this->pdo = $pdo;
        }
        public function getAllArticles() {
            $stmt = $this->pdo->query("SELECT * FROM article ORDER BY dateCreation DESC");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    
        public function getArticlesByCategory($categorieId) {
            if ($categorieId !== null) {
                $stmt = $this->pdo->prepare("SELECT * FROM article WHERE categorie = ? ORDER BY dateCreation DESC");
                $stmt->execute([$categorieId]);
            } else {
                $stmt = $this->pdo->query("SELECT * FROM article ORDER BY dateCreation DESC");
            }
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getArticleById($articleId) {
            $stmt = $this->pdo->prepare("SELECT * FROM article WHERE id = ?");
            $stmt->execute([$articleId]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    
        public function getCategoryName($categorieId) {
            if ($categorieId !== null) {
                $stmtCat = $this->pdo->prepare("SELECT libelle FROM categorie WHERE id = ?");
                $stmtCat->execute([$categorieId]);
                return $stmtCat->fetch(PDO::FETCH_ASSOC);
            }
            return ['libelle' => 'Toutes les catégories'];
        }
 }

?>