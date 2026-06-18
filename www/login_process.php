<?php


require 'database.php';


$email = $_POST['email'];
$password = $_POST['password'];

if(empty($email)){
    echo htmlspecialchars("Email mag niet leeg zijn");
    exit;
}

if(empty($password)){
    echo htmlspecialchars("Wachtwoord mag niet leeg zijn");
    exit;
}

$stmt = $conn->prepare("SELECT user_id AS id, voornaam, achternaam, email, wachtwoord, rol AS role FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC); // 1 gebruiker halen wij op uit db.

if(is_array($user) && !empty($user)){
    if($password == $user['wachtwoord']){

        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['voornaam'] = $user['voornaam'];
        $_SESSION['achternaam'] = $user['achternaam'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        

        if($user['role'] == 'member'){
            header("Location: dashboard_user.php");
            exit;
            
        } else if($user['role'] == 'admin'){
            header("Location: dashboard.php");
            exit;
        }
    }
}

echo htmlspecialchars("Ongeldige inloggegevens");
exit;   