<?php
require_once 'view/navbar.php';
?>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6"><?= htmlspecialchars($article['titre']) ?></h1>
    <p class="text-sm text-gray-500 mb-4">Publié le <?= date('d/m/Y', strtotime($article['dateCreation'])) ?></p>
    <div class="prose max-w-none">
        <p><?= nl2br(htmlspecialchars($article['contenu'])) ?></p>
    </div>
    <a href="index.php" class="btn btn-secondary mt-4">Retour</a>
</div>