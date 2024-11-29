<?php
include 'paso2.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['usuario_id'])) {
        $usuario_id = (int)$_POST['usuario_id'];

        $sql = "DELETE FROM usuarios WHERE id = $usuario_id";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Usuario eliminado correctamente.</p>";
        } else {
            echo "<p>Error al eliminar: " . $conn->error . "</p>";
        }
    } else {
        echo "<p>Error: No se recibió un ID válido.</p>";
    }
} else {
    echo "<p>Método no permitido.</p>";
}

$conn->close();
?>
<a href="eliminar_usuario.php">Volver</a>
