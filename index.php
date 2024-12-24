<?php
include 'db.php';

$search = $_GET['search'] ?? '';
$query = "SELECT * FROM destinations WHERE name LIKE :search OR country LIKE :search";
$stmt = $pdo->prepare($query);
$stmt->execute(['search' => "%$search%"]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Europa Travel Finder</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .card { border: 1px solid #ddd; padding: 15px; margin: 10px; width: 300px; display: inline-block; }
        img { width: 100%; height: auto; }
    </style>
</head>
<body>
    <h1>Find Your Next Travel Destination</h1>
    <form method="GET">
        <input type="text" name="search" placeholder="Search by name or country" value="<?= htmlspecialchars($search) ?>">
        <button type="submit">Search</button>
    </form>
    <div>
        <?php foreach ($results as $destination): ?>
            <div class="card">
                <img src="<?= htmlspecialchars($destination['image_url']) ?>" alt="<?= htmlspecialchars($destination['name']) ?>">
                <h3><?= htmlspecialchars($destination['name']) ?></h3>
                <p><strong>Country:</strong> <?= htmlspecialchars($destination['country']) ?></p>
                <p><?= htmlspecialchars($destination['description']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <footer>
        <p>Discover more travel insights on <a href="https://europa.tips" target="_blank">Europa.tips</a></p>
    </footer>
</body>
</html>
