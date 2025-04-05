<?php
include '../includes/db.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = $pdo->prepare("SELECT * FROM paintings WHERE id = ?");
    $query->execute([$id]);
    $painting = $query->fetch(PDO::FETCH_ASSOC);

    if (!$painting) {
        header("Location: paintings.php");
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $year = $_POST['year'];
        $artist_name = $_POST['artist_name'];
        $width = $_POST['width'];
        $height = $_POST['height'];

        $query = $pdo->prepare("UPDATE paintings SET title = ?, year = ?, artist_name = ?, width = ?, height = ? WHERE id = ?");
        $query->execute([$title, $year, $artist_name, $width, $height, $id]);

        header("Location: paintings.php");
        exit;
    }
} else {
    header("Location: paintings.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Painting</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #ffffff;
            font-family: 'Lato', sans-serif;
        }
        h2 {
            color: #4E598C;
            margin-top: 30px;
            text-align: center;
        }
        form {
            max-width: 600px;
            margin: auto;
        }
        input, button {
            margin: 10px 0;
        }
        button {
            background-color: #F9C784;
            color: #4E598C;
            border: none;
        }
        button:hover {
            background-color: #f1b96d;
        }
    </style>
</head>
<body>

<h2>Edit Painting</h2>
<form action="edit_painting.php?id=<?= $painting['id'] ?>" method="POST" class="p-4 shadow rounded bg-light">
    <input class="form-control" type="text" name="title" value="<?= htmlspecialchars($painting['title']) ?>" required>
    <input class="form-control" type="number" name="year" value="<?= $painting['year'] ?>" required>
    <input class="form-control" type="text" name="artist_name" value="<?= htmlspecialchars($painting['artist_name']) ?>" required>
    <input class="form-control" type="number" name="width" value="<?= $painting['width'] ?>" required>
    <input class="form-control" type="number" name="height" value="<?= $painting['height'] ?>" required>
    <button type="submit" class="btn w-100">Save Changes</button>
</form>

</body>
</html>
