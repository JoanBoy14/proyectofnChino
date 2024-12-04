<?php
include 'db.php';

// Consultar todos los proveedores
$sql = "SELECT * FROM proveedores";
$stmt = $conn->query($sql);
$proveedores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Proveedores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Gestión de Proveedores</h1>
        <a href="crear_proveedor.php" class="btn btn-primary mb-3">Agregar Proveedor</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Contacto</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($proveedores as $proveedor): ?>
                    <tr>
                        <td><?= $proveedor['id'] ?></td>
                        <td><?= $proveedor['nombre'] ?></td>
                        <td><?= $proveedor['contacto'] ?></td>
                        <td><?= $proveedor['telefono'] ?></td>
                        <td><?= $proveedor['direccion'] ?></td>
                        <td>
                            <a href="editar_proveedor.php?id=<?= $proveedor['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="eliminar_proveedor.php?id=<?= $proveedor['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este proveedor?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
