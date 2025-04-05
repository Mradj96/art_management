<?php
include '../includes/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $year = $_POST['year'];
    $artist_name = $_POST['artist_name'];
    $width = $_POST['width'];
    $height = $_POST['height'];

    $query = $pdo->prepare("INSERT INTO paintings (title, year, artist_name, width, height) VALUES (?, ?, ?, ?, ?)");
    $query->execute([$title, $year, $artist_name, $width, $height]);

    header("Location: paintings.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Painting</title>
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

<h2>Add New Painting</h2>
<form action="add_painting.php" method="POST" class="p-4 shadow rounded bg-light">
    <input class="form-control" type="text" name="title" placeholder="Title" required>
    <input class="form-control" type="number" name="year" placeholder="Year" required>
    <input class="form-control" type="text" name="artist_name" placeholder="Artist Name" required>
    <input class="form-control" type="number" name="width" placeholder="Width (cm)" required>
    <input class="form-control" type="number" name="height" placeholder="Height (cm)" required>
    <button type="submit" class="btn w-100">Add Painting</button>
</form>

</body>
</html>
