<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        die("Todos los campos son obligatorios.");
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (username, password) VALUES (:username, :password)";
    $stmt = $conn->prepare($sql);

    try {
        $stmt->execute([':username' => $username, ':password' => $hashed_password]);
        echo "Usuario registrado con éxito. <a href='login_form.php'>Inicia sesión aquí</a>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
