<?php
require_once 'connexion.php';
require_once 'header.php';

$sql = "SELECT * FROM categorie";
$stmt = $pdo->query($sql);
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Categories</h1>
        <?php if (empty($categories)): ?>
            <p class="text-gray-600">No categories available.</p>

        <?php else: ?>
            <ul class="list-disc pl-5">
                <?php foreach ($categories as $category): ?>
                    <li class="mb-2">
                        <a href="articles.php?categorie_id=<?php echo $category['id']; ?>" class="text-blue-500 hover:underline">
                            <?php echo htmlspecialchars($category['libelle']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    <footer class="mt-8 text-center">
        <p class="text-gray-600">© 2023 Actuality App. All rights reserved.</p>
    </footer>
</body>
</html>