<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: paso10.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paso 10</title>
</head>
<body>
    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h1>
    <p>Has iniciado sesión exitosamente.</p>
    <p><a href="paso10_cerrar.php">Cerrar sesión</a></p>
</body>
</html>

