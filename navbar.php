<?php
require_once 'connexion.php';

$sql = "SELECT * FROM categorie";
$stmt = $pdo->query($sql);
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="navbar bg-base-100 shadow-md">
  <div class="flex-1">
    <a href="index.php" class="btn btn-ghost normal-case text-xl">Actuality App</a>
  </div>
  <div class="flex-none">
    <ul class="menu menu-horizontal px-1">
      <?php foreach ($categories as $category): ?>
        <li>
          <a href="index.php?categorie_id=<?= $category['id']; ?>" class="hover:text-primary">
            <?= htmlspecialchars($category['libelle']); ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>
