<?php
require_once '../includes/db.php';
include '../includes/header.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $year = $_POST['year'];
    $artist_name = $_POST['artist_name'];
    $width = $_POST['width'];
    $height = $_POST['height'];

    // Validation du champ year pour s'assurer qu'il est un entier valide
    if (!is_numeric($year) || $year < 1000 || $year > 9999) {
        echo "<p style='color: red;'>Please enter a valid year between 1000 and 9999.</p>";
    } else {
        // Préparation de la requête SQL pour insérer les données
        $sql = "INSERT INTO paintings (title, year, artist_name, width, height) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$title, $year, $artist_name, $width, $height]);

        // Redirection vers la page d'accueil après l'insertion
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Painting</title>
    <!-- Lien vers Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f1e3;
        }
        .container {
            max-width: 600px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: bold;
            color: #4e598c;
        }
        .btn-primary {
            background-color: #4e598c;
            border: none;
        }
        .btn-primary:hover {
            background-color: #3a456f;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4" style="color: #4e598c;">Add a New Painting</h2>

    <form action="" method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="year" class="form-label">Year</label>
                    <input type="number" class="form-control" id="year" name="year" required>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="artist_name" class="form-label">Artist Name</label>
            <input type="text" class="form-control" id="artist_name" name="artist_name" required>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="width" class="form-label">Width (cm)</label>
                    <input type="number" class="form-control" id="width" name="width" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="height" class="form-label">Height (cm)</label>
                    <input type="number" class="form-control" id="height" name="height" required>
                </div>
            </div>
        </div>

        <!-- Champ de vérification (captcha simple) -->
        <div class="mb-3">
            <label class="form-label">What is 7 + 2?</label>
            <input type="number" class="form-control" name="captcha" required>
        </div>

        <!-- Checkbox pour le consentement -->
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="consent" required>
            <label class="form-check-label" for="consent">I accept that my email will be stored to provide a response.</label>
        </div>

        <button type="submit" class="btn btn-primary w-100">Submit</button>
    </form>

    <div class="mt-3">
        <a href="index.php" class="btn btn-secondary w-100">Back to Dashboard</a>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
