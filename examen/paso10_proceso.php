<?php
session_start(); 
include 'paso2.php'; 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['correo']) && isset($_POST['password'])) {
        $correo = $conn->real_escape_string($_POST['correo']);
        $password = $_POST['password'];
        $sql = "SELECT id, nombre, password FROM usuarios2 WHERE correo = '$correo'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['usuario'] = $user['nombre'];
                header("Location: paso10_despues.php");
                exit;
            } else {
                echo "<p>Contraseña incorrecta. <a href='paso10.php'>Intente de nuevo</a></p>";
            }
        } else {
            echo "<p>Correo no encontrado. <a href='paso10.php'>Intente de nuevo</a></p>";
        }
    } else {
        echo "<p>Por favor complete todos los campos de la pagina.</p>";
    }
}

$conn->close();
?>
