<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        h2 {
            color: #e67e22; /* Naranja */
            font-size: 2rem;
            margin-bottom: 20px;
        }
        form {
            margin: 0 auto;
            text-align: left;
        }
        label {
            font-size: 1rem;
            margin-bottom: 8px;
            display: block;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }
        input:focus {
            border-color: #e67e22;
            outline: none;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #e67e22; /* Naranja */
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #d46a1f; /* Naranja más oscuro */
        }
        a {
            display: block;
            margin-top: 15px;
            color: #e67e22; /* Naranja */
            text-decoration: none;
            font-size: 1rem;
        }
        a:hover {
            color: #d46a1f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <form action="login.php" method="POST">
            <label for="username">Nombre de Usuario:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Iniciar Sesión</button>
        </form>
        <a href="register_form.php">¿No tienes cuenta? Regístrate</a>
    </div>
</body>
</html>
