<?php
include '../includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #FFFFFF;
            font-family: 'Lato', sans-serif;
        }
        .container {
            padding: 20px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.05);
            background-color: #FFFFFF;
        }
        .card-title {
            color: #4E598C;
            font-weight: bold;
        }
        .card-text {
            color: #4E598C;
        }
        .btn-custom, .btn-secondary {
            background-color: #F9C784;
            color: #4E598C;
            border: none;
        }
        .btn-custom:hover, .btn-secondary:hover {
            background-color: #f1b96d;
            color: #4E598C;
        }
        .display-4 {
            color: #4E598C;
        }
        .lead {
            color: #4E598C;
        }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="text-center mb-5">
        <h1 class="display-4">Welcome to the Art Gallery Management</h1>
        <p class="lead">Manage paintings and storage locations with ease.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-5 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Manage Paintings</h5>
                    <p class="card-text">View, add, edit and delete paintings from the gallery collection.</p>
                    <a href="paintings.php" class="btn btn-secondary w-100">Go to Paintings</a>
                </div>
            </div>
        </div>

        <div class="col-md-5 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Manage Warehouses</h5>
                    <p class="card-text">Assign paintings to storage locations and organize your inventory.</p>
                    <a href="warehouses.php" class="btn btn-secondary w-100">Go to Warehouses</a>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <a href="paintings.php" class="btn btn-secondary w-100">← Back to Paintings</a>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
