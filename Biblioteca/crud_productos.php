<?php
include 'db.php';

// Consultar todos los productos
$sql = "SELECT * from productos";
$stmt = $conn->query($sql);
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f9;
            color: #333;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h1 {
            color: #e67e22; /* Naranja */
            margin-bottom: 20px;
            text-align: center;
        }
        .btn-primary {
            background-color: #e67e22; /* Naranja */
            border: none;
        }
        .btn-primary:hover {
            background-color: #d46a1f; /* Naranja más oscuro */
        }
        table {
            margin-top: 20px;
        }
        th {
            background-color: #e67e22; /* Naranja */
            color: white;
        }
        td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gestión de Productos</h1>
        <a href="crear_producto.php" class="btn btn-primary mb-3">Agregar Producto</a>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?= $producto['id'] ?></td>
                        <td><?= htmlspecialchars($producto['nombre']) ?></td>
                        <td><?= htmlspecialchars($producto['descripcion']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
