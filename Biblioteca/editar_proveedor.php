<?php
include 'db.php';

// Verificar si se ha enviado un ID en la URL
if (!isset($_GET['id'])) {
    header("Location: crud_proveedores.php");
    exit;
}

$id = $_GET['id'];

// Obtener los datos del proveedor para precargar en el formulario
$sql = "SELECT * FROM proveedores WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute([':id' => $id]);
$proveedor = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar si el proveedor existe
if (!$proveedor) {
    header("Location: crud_proveedores.php");
    exit;
}

// Actualizar los datos del proveedor si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $contacto = $_POST['contacto'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    $sql = "UPDATE proveedores 
            SET nombre = :nombre, contacto = :contacto, telefono = :telefono, direccion = :direccion 
            WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':nombre' => $nombre,
        ':contacto' => $contacto,
        ':telefono' => $telefono,
        ':direccion' => $direccion,
        ':id' => $id,
    ]);

    header("Location: crud_proveedores.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Proveedor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Proveedor</h1>
        <form action="editar_proveedor.php?id=<?= $id ?>" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="<?= htmlspecialchars($proveedor['nombre']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="contacto" class="form-label">Contacto</label>
                <input type="text" id="contacto" name="contacto" class="form-control" value="<?= htmlspecialchars($proveedor['contacto']) ?>">
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" id="telefono" name="telefono" class="form-control" value="<?= htmlspecialchars($proveedor['telefono']) ?>">
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <textarea id="direccion" name="direccion" class="form-control"><?= htmlspecialchars($proveedor['direccion']) ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="crud_proveedores.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
