<?php
$host = "localhost";
$dbname = "projetphp";
$user = "root";
$pass = "159753258";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}
?>
