<?php

require 'database.php';

$stmt = $conn->prepare("SELECT * FROM items");
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);


include 'header.php';

?>

<main>
    <div class="items">
        <?php foreach ($items as $item): ?>
            <div class="item">
                <h2><?php echo htmlspecialchars($item['titel']); ?></h2>
                <p><?php echo htmlspecialchars($item['omschrijving']); ?></p>
                <p>Conditie: <?php echo htmlspecialchars($item['conditie']); ?></p>
                <p>Prijs: €<?php echo number_format($item['prijs'], 2); ?></p>
                <a href="view_item.php?id=<?php echo $item['item_id']; ?>">Details bekijken</a>
            </div>
        <?php endforeach; ?>
    </div>