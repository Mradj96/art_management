<?php
// Inclure la connexion à la base de données
include '../includes/db.php';

// Vérifier si l'ID de la peinture est passé dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Récupérer les informations de la peinture à modifier
    $query = $pdo->prepare("SELECT * FROM paintings WHERE id = ?");
    $query->execute([$id]);
    $painting = $query->fetch(PDO::FETCH_ASSOC);

    // Si la peinture n'existe pas, rediriger vers la page des peintures
    if (!$painting) {
        header("Location: paintings.php");
        exit;
    }

    // Vérifier si le formulaire de modification a été soumis
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Récupérer les données modifiées
        $title = $_POST['title'];
        $year = $_POST['year'];
        $artist_name = $_POST['artist_name'];
        $width = $_POST['width'];
        $height = $_POST['height'];

        // Préparer la requête SQL pour mettre à jour la peinture
        $query = $pdo->prepare("UPDATE paintings SET title = ?, year = ?, artist_name = ?, width = ?, height = ? WHERE id = ?");
        $query->execute([$title, $year, $artist_name, $width, $height, $id]);

        // Rediriger vers la page des peintures après modification
        header("Location: paintings.php");
        exit;
    }
} else {
    // Si l'ID de la peinture n'est pas fourni, rediriger vers la page des peintures
    header("Location: paintings.php");
    exit;
}
?>

<h2>Edit Painting</h2>
<form action="edit_painting.php?id=<?= $painting['id'] ?>" method="POST">
    <input type="text" name="title" value="<?= htmlspecialchars($painting['title']) ?>" required>
    <input type="number" name="year" value="<?= $painting['year'] ?>" required>
    <input type="text" name="artist_name" value="<?= htmlspecialchars($painting['artist_name']) ?>" required>
    <input type="number" name="width" value="<?= $painting['width'] ?>" required>
    <input type="number" name="height" value="<?= $painting['height'] ?>" required>
    <button type="submit">Save Changes</button>
</form>
