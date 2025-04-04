<?php
// Inclure la connexion à la base de données
include '../includes/db.php';

// Vérifier si l'ID de la peinture est passé dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Préparer la requête SQL pour supprimer la peinture
    $query = $pdo->prepare("DELETE FROM paintings WHERE id = ?");
    $query->execute([$id]);

    // Rediriger vers la page des peintures après suppression
    header("Location: paintings.php");
    exit;
} else {
    // Si l'ID n'est pas fourni, rediriger vers la page des peintures
    header("Location: paintings.php");
    exit;
}
