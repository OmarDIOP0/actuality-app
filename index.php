<?php 
require_once 'connexion.php';

$categorieId = isset($_GET['categorie_id']) ? intval($_GET['categorie_id']) : null;
if($categorieId !== null) {
  $stmtCat = $pdo->prepare("SELECT libelle FROM categorie WHERE id = ?");
  $stmtCat->execute([$categorieId]);
  $categorie = $stmtCat->fetch(PDO::FETCH_ASSOC);

  $stmt = $pdo->prepare("SELECT * FROM article WHERE categorie = ? ORDER BY dateCreation DESC");
  $stmt->execute([$categorieId]);
  $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
else{
  $categorie = ['libelle' => 'Toutes les catégories'];
  $stmt = $pdo->query("SELECT * FROM article ORDER BY dateCreation DESC");
  $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Test DaisyUI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
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
    <h1 class="text-3xl font-bold mb-6">
      Articles dans la catégorie : 
      <span class="text-primary"><?= htmlspecialchars($categorie['libelle'] ?? 'Inconnue') ?></span>
    </h1>

    <?php if (empty($articles)): ?>
      <div class="alert alert-info shadow-lg">
        <span>Aucun article disponible pour cette catégorie.</span>
      </div>
    <?php else: ?>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($articles as $article): 
          $modalId = 'modal_' . $article['id']; // Création d'un ID unique pour chaque modal
        ?>
          <div class="card bg-base-200 shadow-lg">
            <div class="card-body">
              <h2 class="card-title"><?= htmlspecialchars($article['titre']) ?></h2>
              <p class="text-sm text-gray-500 mb-2">
                Publié le <?= date('d/m/Y à H:i', strtotime($article['dateCreation'])) ?>
              </p>
              <p class="line-clamp-4"><?= nl2br(htmlspecialchars($article['contenu'])) ?></p>
              <div class="card-actions justify-end mt-4">
                <!-- <button onclick="document.getElementById('<?= $modalId ?>').showModal()" class="btn btn-primary btn-sm">
                  voir plus
                </button> -->
                <button>
                  <a href="detail-article.php?categorie_id=<?= $article['id'] ?>" class="btn btn-primary btn-sm">
                    Voir plus
                  </a>
              </div>
            </div>
          </div>

          <!-- Modal DaisyUI -->
          <dialog id="<?= $modalId ?>" class="modal">
            <div class="modal-box max-w-2xl">
              <h3 class="font-bold text-lg"><?= htmlspecialchars($article['titre']) ?></h3>
              <p class="text-sm text-gray-500 mb-2">
                Publié le <?= date('d/m/Y à H:i', strtotime($article['dateCreation'])) ?>
              </p>
              <p class="py-4 whitespace-pre-line"><?= nl2br(htmlspecialchars($article['contenu'])) ?></p>
              <div class="modal-action">
                <form method="dialog">
                  <button class="btn">Fermer</button>
                </form>
              </div>
            </div>
          </dialog>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</body>
</html>