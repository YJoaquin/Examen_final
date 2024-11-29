<?php
session_start();
include 'conexion.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['password']) && isset($_POST['confirmar_password'])) {
        $nombre = $conn->real_escape_string($_POST['nombre']);
        $correo = $conn->real_escape_string($_POST['correo']);
        $password = $_POST['password'];
        $confirmar_password = $_POST['confirmar_password'];

        // Verificar que las contraseñas coincidan
        if ($password !== $confirmar_password) {
            echo "<p>Las contraseñas no coinciden. <a href='registrarse.php'>Intente de nuevo</a></p>";
            exit;
        }

        // Validar si el correo ya está registrado
        $sql = "SELECT id FROM usuarios WHERE correo = '$correo'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<p>El correo ya está registrado. <a href='registrarse.php'>Intente con otro correo</a></p>";
            exit;
        }

        // Encriptar la contraseña antes de almacenarla
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insertar el nuevo usuario en la base de datos
        $sql = "INSERT INTO usuarios (nombre, correo, password, fecha_registro) VALUES ('$nombre', '$correo', '$hashed_password', NOW())";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Registro exitoso. <a href='login.php'>Iniciar sesión</a></p>";
        } else {
            echo "<p>Error al registrar usuario: " . $conn->error . "</p>";
        }
    } else {
        echo "<p>Por favor complete todos los campos.</p>";
    }
}

$conn->close();
?>

