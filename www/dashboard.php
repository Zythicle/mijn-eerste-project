<?php
// Path: www/dashboard.php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "You are not logged in, please login. ";
    echo "<a href='login.php'>Login here</a>";
    exit;
}


if ($_SESSION['role'] != 'admin' && $_SESSION['role'] != 'employee') {
    echo "You are not allowed to view this page, please login as ";
    exit;
}

require 'header.php';
require 'database.php';


$sql = [];
$stmt = $conn->prepare("SELECT COUNT(user_id) AS total FROM users");
$stmt->execute();
$users = $stmt->fetch(PDO::FETCH_ASSOC);
array_push($sql, "SELECT COUNT(user_id) AS total FROM users");

$stmt = $conn->prepare("SELECT COUNT(user_id) AS total FROM users WHERE rol = 'employee'");
$stmt->execute();
$employees = $stmt->fetch(PDO::FETCH_ASSOC);
array_push($sql, "SELECT COUNT(user_id) AS total FROM users WHERE rol = 'employee'");

?>

<main class="dashboard">
    <h1>Dashboard</h1>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Welkom <?php echo htmlspecialchars($_SESSION['voornaam'], ENT_QUOTES, 'UTF-8') ?></h2>
                <p>Je bent ingelogd als <?php echo htmlspecialchars($_SESSION['role'], ENT_QUOTES, 'UTF-8') ?></p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-group">
                <h2 for="">Totaal aantal gebruikers</h2>
                <p><?php echo htmlspecialchars($users['total'], ENT_QUOTES, 'UTF-8') ?></p>
            </div>
            <div class="card-group">
                <h2 for="">Totaal aantal medewerkers</h2>
                <p><?php echo htmlspecialchars($employees['total'], ENT_QUOTES, 'UTF-8') ?></p>
            </div>
        </div>
    </div>
</main>

<?php require 'footer.php' ?>