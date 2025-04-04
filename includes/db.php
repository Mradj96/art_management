<?php
$host = "localhost";
$port = "8889";  // Port par défaut sous MAMP
$dbname = "art_management";
$username = "root";  
$password = "root";  // Sous MAMP, le mot de passe est "root"

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
