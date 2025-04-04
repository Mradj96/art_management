<?php
// Inclure la connexion à la base de données
include '../includes/db.php';

// Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $title = $_POST['title'];
    $year = $_POST['year'];
    $artist_name = $_POST['artist_name'];
    $width = $_POST['width'];
    $height = $_POST['height'];

    // Préparer la requête SQL pour insérer une nouvelle peinture
    $query = $pdo->prepare("INSERT INTO paintings (title, year, artist_name, width, height) VALUES (?, ?, ?, ?, ?)");
    $query->execute([$title, $year, $artist_name, $width, $height]);

    // Rediriger vers la page des peintures après ajout
    header("Location: paintings.php");
    exit;
}
?>

<h2>Add New Painting</h2>
<form action="add_painting.php" method="POST">
    <input type="text" name="title" placeholder="Title" required>
    <input type="number" name="year" placeholder="Year" required>
    <input type="text" name="artist_name" placeholder="Artist Name" required>
    <input type="number" name="width" placeholder="Width (cm)" required>
    <input type="number" name="height" placeholder="Height (cm)" required>
    <button type="submit">Add Painting</button>
</form>
