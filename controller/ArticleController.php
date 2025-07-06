<?php 
    require_once 'connexion.php';
    require_once 'model/Article.php';
    require_once 'model/Categorie.php';

    class ArticleController {
       public static function showAccueil(){
        $categorieId = isset($_GET['categorie_id']) ? $_GET['categorie_id'] : null;
        if($categorieId !== null) {
            $categorie = Categorie::getCategoryById($categorieId);
            $article = Article::getArticlesByCategory($categorieId);
        } else {
            $categorie = ['libelle' => 'Toutes les catégories'];
            $article = Article::getAllArticles();
        }
        require_once 'view/index.php';
       }
    }
?>