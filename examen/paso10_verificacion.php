<?php
session_start();
include 'paso2.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['password']) && isset($_POST['confirmar_password'])) {
        $nombre = $conn->real_escape_string($_POST['nombre']);
        $correo = $conn->real_escape_string($_POST['correo']);
        $password = $_POST['password'];
        $confirmar_password = $_POST['confirmar_password'];
        if ($password !== $confirmar_password) {
            echo "<p>Las contraseñas no coinciden. <a href='paso10.registrarse.php'>Intente de nuevo</a></p>";
            exit;
        }
        $sql = "SELECT id FROM usuarios2 WHERE correo = '$correo'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<p>El correo ya está registrado. <a href='paso10_registrarse.php'>Intente con otro correo</a></p>";
            exit;
        }
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios2 (nombre, correo, password, fecha_registro) VALUES ('$nombre', '$correo', '$hashed_password', NOW())";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Registro exitoso. <a href='paso10.php'>Iniciar sesión</a></p>";
        } else {
            echo "<p>Error al registrar usuario: " . $conn->error . "</p>";
        }
    } else {
        echo "<p>Por favor complete todos los campos.</p>";
    }
}

$conn->close();
?>

