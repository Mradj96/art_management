<?php
// Connexion déjà faite ailleurs, ici juste header HTML + nav si besoin
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Art Gallery Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Lato', sans-serif;
        }

        .navbar {
            background-color: #4E598C;
        }

        .navbar-brand,
        .navbar-nav .nav-link {
            color: #FFFFFF !important;
            font-weight: 500;
        }

        .navbar-nav .nav-link:hover {
            color: #F9C784 !important;
        }

        .nav-link.active {
            font-weight: bold;
            text-decoration: underline;
            color: #F9C784 !important;
        }

        .navbar-toggler {
            border-color: #F9C784;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='%23F9C784' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/public/index.php">Art Gallery</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="paintings.php" class="nav-link">Paintings</a>
                </li>
                <li class="nav-item">
                    <a href="warehouses.php" class="nav-link">Warehouses</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
g