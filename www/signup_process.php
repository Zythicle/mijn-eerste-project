<?php

//schrijf validatie met empty() voor alle velden

//check of voornaam en achternaam minstens 3 karakters hebben.

//Check of rol overeenkomst met de enum waardes uit de database.


if( empty($_POST['voornaam']) ||
    empty($_POST['achternaam']) ||
    empty($_POST['email']) ||
    empty($_POST['wachtwoord']) ||
    empty($_POST['role'])
    ){
        echo htmlspecialchars("Een van de velden is leeg");
    exit;
}

if( strlen($_POST['voornaam']) < 3 ||
    strlen($_POST['achternaam']) < 3 ||
    strlen($_POST['email']) < 3 ||
    strlen($_POST['wachtwoord']) < 3 ||
    strlen($_POST['role']) < 3

){
    echo htmlspecialchars("Voor elk veld moet er minstens drie karakters opgegeven worden");
    exit;
}

if( strlen($_POST['wachtwoord']) < 8 ){
    echo htmlspecialchars("wachtwoord moet minstens 8 karakters hebben");
    exit;
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo htmlspecialchars("Vul een geldig emailadres in");
    exit;
}

require 'database.php';

$email = $_POST['email'];
$password = $_POST['wachtwoord'];
$firstname = $_POST['voornaam'];
$lastname = $_POST['achternaam'];
$role = $_POST['role'];

$sql = "INSERT INTO users (voornaam, achternaam, email, wachtwoord, rol)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$firstname, $lastname, $email, $password, $role]);

if($result){
    header("Location: login.php");
    exit;
}
else{
    echo htmlspecialchars('er is iets fout gegaan');
}






