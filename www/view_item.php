<?php

require 'database.php';

$stmt = $conn->prepare("SELECT * FROM items WHERE item_id = :id");
$stmt->execute(['id' => $_GET['id']]);
$item = $stmt->fetch(PDO::FETCH_ASSOC);

require 'header.php';
?>

<main>
    <div class="item-detail">
        <h1><?php echo htmlspecialchars($item['titel']); ?></h1>
        <p><?php echo htmlspecialchars($item['omschrijving']); ?></p>
        <p>Conditie: <?php echo htmlspecialchars($item['conditie']); ?></p>
        <p>Status: <?php echo htmlspecialchars($item['status']); ?></p>
        <p>Prijs: €<?php echo number_format($item['prijs'], 2); ?></p>
        <form action="add_to_cart.php" method="post">
            <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
            <button type="submit">Toevoegen aan winkelmand</button>
        </form>
    </div>