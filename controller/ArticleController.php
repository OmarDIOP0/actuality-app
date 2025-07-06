<?php 
require_once 'connexion.php';
require_once 'model/Article.php';
require_once 'model/Categorie.php';

class ArticleController {
    
    public static function showAccueil() {
        $categorieId = isset($_GET['categorie_id']) ? intval($_GET['categorie_id']) : null;

        if ($categorieId !== null) {
            $categorie = Categorie::getCategoryById($categorieId);
            $articles = Article::getArticlesByCategory($categorieId);
        } else {
            $categorie = ['libelle' => 'Toutes les catégories'];
            $articles = Article::getAllArticles();
        }

        require_once 'view/accueil.php';
    }

    public static function showDetail() {
        $articleId = isset($_GET['id']) ? intval($_GET['id']) : 0;

        if ($articleId > 0) {
            $article = Article::getArticleById($articleId);
            if ($article) {
                require_once 'view/detail-article.php';
                return;
            }
        }

        header("Location: index.php?action=accueil");
        exit;
    }
}
?>
