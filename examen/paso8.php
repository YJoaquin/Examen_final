<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paso 8</title>
</head>
<body>
    <h1>Paso 8</h1>

    <?php
    include 'paso2.php';

    $sql = "SELECT id, nombre FROM usuarios";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        ?>

        <form method="POST" action="paso8_proceso.php">
            <label for="usuario_id">Seleccionar Usuario:</label>
            <select name="usuario_id" id="usuario_id" required>
                <option value="">--Seleccione un usuario--</option>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
                }
                ?>
            </select>

            <br><br>
            <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">Eliminar</button>
        </form>

        <?php
    } else {
        echo "<p>No hay usuarios registrados.</p>";
    }

    $conn->close();
    ?>

</body>
</html>
