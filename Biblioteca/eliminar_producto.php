<?php
include 'db.php';

// Verificar si se ha recibido un ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para eliminar el producto
    $sql = "DELETE FROM productos WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id]);

    // Redirigir de vuelta a la lista de productos
    header("Location: crud_productos.php");
    exit;
} else {
    // Si no se recibe un ID, redirigir a la lista de productos
    header("Location: crud_productos.php");
    exit;
}
