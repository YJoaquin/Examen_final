<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paso 9</title>
</head>
<body>
    <h1>Paso 9</h1>

    <form method="POST" action="paso9.php">
        <label for="fecha_inicio">Fecha de Inicio:</label>
        <input type="date" name="fecha_inicio" id="fecha_inicio" required>
        <br><br>
        
        <label for="fecha_fin">Fecha de Fin:</label>
        <input type="date" name="fecha_fin" id="fecha_fin" required>
        <br><br>

        <button type="submit">Filtrar</button>
    </form>

    <?php
    include 'paso2.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['fecha_inicio']) && isset($_POST['fecha_fin'])) {
            $fecha_inicio = $_POST['fecha_inicio'];
            $fecha_fin = $_POST['fecha_fin'];
            $sql = "SELECT * FROM usuarios WHERE fecha_registro BETWEEN '$fecha_inicio' AND '$fecha_fin' ORDER BY fecha_registro DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table border='1'>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Fecha de Registro</th>
                        </tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['nombre'] . "</td>
                            <td>" . $row['correo'] . "</td>
                            <td>" . $row['fecha_registro'] . "</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No se encontraron usuarios en ese rango de fechas.</p>";
            }
        } else {
            echo "<p>Por favor, ingresa ambas fechas.</p>";
        }
    }

    $conn->close();
    ?>
</body>
</html>
