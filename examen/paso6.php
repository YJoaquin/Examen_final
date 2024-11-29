<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "practica_final";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
if (isset($_GET['buscar'])) {
    $buscar = $_GET['buscar'];

    $sql = "SELECT * FROM usuarios WHERE nombre LIKE '%$buscar%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr><th>ID</th><th>Nombre</th><th>Correo</th><th>Fecha Registro</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nombre']}</td>
                    <td>{$row['correo']}</td>
                    <td>{$row['fecha_registro']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron resultados para '$buscar'.";
    }
}
$conn->close();
?>
