<?php
$host = "localhost";
$dbname = "projetphp";
$user = "root";
$pass = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}
?>
