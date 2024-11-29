<?php
session_start(); 
if (isset($_SESSION['usuario'])) {
    header("Location: paso10_despues.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Iniciar sesión</h1>

    <form method="POST" action="paso10_proceso.php">
        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo" placeholder="Ingrese su correo" required>
        <br><br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" placeholder="Ingrese su contraseña" required>
        <br><br>
        <button type="submit">Iniciar sesión</button>
    </form>

    <br>
    <p>¿No tienes una cuenta? <a href="paso10_registrarse.php">Regístrate aquí</a></p>
</body>
</html>

