<?php
require_once '../includes/db.php';
include '../includes/header.php';

// Ajout d'un entrepôt
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['location'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];

    $stmt = $pdo->prepare("INSERT INTO warehouses (name, location) VALUES (?, ?)");
    $stmt->execute([$name, $location]);

    header("Location: warehouses.php");
    exit;
}

// Suppression d'un entrepôt
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $stmt = $pdo->prepare("DELETE FROM warehouses WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: warehouses.php");
    exit;
}

// Récupération des entrepôts
$stmt = $pdo->query("SELECT * FROM warehouses ORDER BY name");
$warehouses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Warehouses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f1e3;
            font-family: 'Lato', sans-serif;
        }
        .container {
            max-width: 800px;
            margin-top: 50px;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        h2 {
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



<div class="container">
    <h2 class="mb-4">Manage Warehouses</h2>

    <form action="warehouses.php" method="POST" class="row g-3 mb-4">
        <div class="col-md-6">
            <input type="text" name="name" class="form-control" placeholder="Warehouse Name" required>
        </div>
        <div class="col-md-6">
            <input type="text" name="location" class="form-control" placeholder="Location" required>
        </div>
        <div class="col-12 text-end">
            <button type="submit" class="btn btn-primary">Add Warehouse</button>
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th style="width: 100px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($warehouses as $warehouse): ?>
                <tr>
                    <td><?= htmlspecialchars($warehouse['name']) ?></td>
                    <td><?= htmlspecialchars($warehouse['location']) ?></td>
                    <td>
                        <a href="warehouses.php?delete_id=<?= $warehouse['id'] ?>" class="btn btn-sm btn-danger"
                           onclick="return confirm('Are you sure you want to delete this warehouse?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="mt-4">
        <a href="../public/index.php" class="btn btn-secondary w-100">← Back to Dashboard</a>
    </div>
</div>

</body>
</html>
