<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "practica_final";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];

    $sql = "INSERT INTO usuarios (nombre, correo) VALUES ('$nombre', '$correo')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario registrado exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

