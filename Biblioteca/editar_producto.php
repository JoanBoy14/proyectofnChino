<?php
include 'db.php';

// Verificar si se ha enviado un ID
if (!isset($_GET['id'])) {
    header("Location: crud_productos.php");
    exit;
}

$id = $_GET['id'];

// Obtener datos del producto
$sql = "SELECT * FROM productos WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute([':id' => $id]);
$producto = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$producto) {
    header("Location: crud_productos.php");
    exit;
}

// Obtener proveedores
$sql = "SELECT * FROM proveedores";
$stmt = $conn->query($sql);
$proveedores = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $proveedor_id = $_POST['proveedor_id'];

    $sql = "UPDATE productos 
            SET nombre = :nombre, descripcion = :descripcion, precio = :precio, cantidad = :cantidad, proveedor_id = :proveedor_id 
            WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':nombre' => $nombre,
        ':descripcion' => $descripcion,
        ':precio' => $precio,
        ':cantidad' => $cantidad,
        ':proveedor_id' => $proveedor_id,
        ':id' => $id,
    ]);

    header("Location: crud_productos.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Producto</h1>
        <form action="editar_producto.php?id=<?= $id ?>" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="<?= htmlspecialchars($producto['nombre']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea id="descripcion" name="descripcion" class="form-control"><?= htmlspecialchars($producto['descripcion']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" id="precio" name="precio" class="form-control" value="<?= $producto['precio'] ?>" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" id="cantidad" name="cantidad" class="form-control" value="<?= $producto['cantidad'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="proveedor_id" class="form-label">Proveedor</label>
                <select id="proveedor_id" name="proveedor_id" class="form-control" required>
                <?php foreach ($proveedores as $proveedor): ?>
                        <option value="<?= $proveedor['id'] ?>"><?= htmlspecialchars($proveedor['nombre']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
            <a href="crud_productos.php" class="btn btn-secondary">Cancelar</a>
        </form>
