<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #e67e22;
            color: white;
            text-align: center;
            padding: 20px 0;
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        p {
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: #555;
        }
        a {
            display: inline-block;
            margin: 10px 5px;
            padding: 10px 15px;
            background-color: #e67e22;
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #d46a1f;
        }
        .image-section img {
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .info-box {
            background-color: #fffae6;
            color: #e67e22;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            font-size: 1rem;
            border: 1px solid #e67e22;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Biblioteca Gral. Tomás Moreno</h1>
    </div>

    <div class="container">
        <h1>Bienvenido a la Biblioteca</h1>
        <p>Descubre un mundo de conocimiento con acceso a miles de libros y recursos. Por favor, regístrate o inicia sesión para gestionar el inventario.</p>

        <div class="image-section">
            <img src="imagenes/gral.jpg" alt="Imagen de biblioteca">
        </div>

        <a href="register_form.php">Registrarse</a>
        <a href="login_form.php">Iniciar Sesión</a>

        <div class="info-box">
            <p><strong>Nota:</strong> Si ya tienes una cuenta, solo inicia sesión para acceder a tus recursos. Si eres nuevo, regístrate y explora la biblioteca.</p>
        </div>
    </div>
</body>
</html>
