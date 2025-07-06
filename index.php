<?php 
require_once 'controller/ArticleController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'accueil';
switch ($action) {
    case 'accueil':
        ArticleController::showAccueil();
        break;
    case 'detail':
        ArticleController::showDetail();
        break;
    default:
        header("Location: index.php?action=accueil");
        exit;
        break;
}
?>