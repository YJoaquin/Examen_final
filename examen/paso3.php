<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "practica_final";

$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "CREATE TABLE usuarios (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabla 'usuarios' creada exitosamente.";
} else {
    echo "Error al crear la tabla: " . $conn->error;
}
?>

