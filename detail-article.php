<?php
require_once 'connexion.php';

$categorie_id = isset($_GET['categorie_id']) ? (int)$_GET['categorie_id'] : 0;
$article = $pdo->prepare("SELECT * FROM article WHERE id = ?");
$article->execute([$categorie_id]);
$article = $article->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($article['titre']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        plugins: [require("daisyui")],
        daisyui: {
            themes: ["light", "dark"],
        },
    }
    </script>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6"><?= htmlspecialchars($article['titre']) ?></h1>
        <p class="text-sm text-gray-500 mb-4">Publié le <?= date('d/m/Y', strtotime($article['dateCreation'])) ?></p>
        <div class="prose max-w-none">
            <p><?= nl2br(htmlspecialchars($article['contenu'])) ?></p>
        </div>
        <a href="index.php" class="btn btn-secondary mt-4">Retour</a>
    </div>
</body>
</html>