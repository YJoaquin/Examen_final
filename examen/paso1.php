<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "CREATE DATABASE practica_final";
if ($conn->query($sql) === TRUE) {
    echo "Base de datos 'practica_final' creada exitosamente.";
} else {
    echo "Error al crear la base de datos: " . $conn->error;
}

$conn->close();
?>
