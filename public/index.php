<?php
// Inclure l'en-tête
include '../includes/header.php';

?>

<div class="container my-5">
    <div class="text-center mb-5">
        <h1 class="display-4" style="color: #4e598c;">Welcome to the Art Gallery Management</h1>
        <p class="lead" style="color: #6c757d;">Manage paintings and storage locations with ease.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-5 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title" style="color: #4e598c;">Manage Paintings</h5>
                    <p class="card-text">View, add, edit and delete paintings from the gallery collection.</p>
                    <a href="paintings/manage_paintings.php" class="btn btn-primary" style="background-color: #f9c784; color: #4e598c;">Go to Paintings</a>
                </div>
            </div>
        </div>
        <div class="col-md-5 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title" style="color: #4e598c;">Manage Warehouses</h5>
                    <p class="card-text">Assign paintings to storage locations and organize your inventory.</p>
                    <a href="warehouses/manage_warehouses.php" class="btn btn-primary" style="background-color: #f9c784; color: #4e598c;">Go to Warehouses</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

?>
