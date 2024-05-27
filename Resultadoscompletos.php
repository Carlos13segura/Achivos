<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styles.css">
<link rel="shortcut icon" href="logo.png"/> 
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventario_pc";

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar si hay errores al conectar
if (mysqli_connect_errno()) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Lista de todas las tablas en la base de datos
$tablas = ["pc", "departamento", "usuario"];

foreach ($tablas as $tabla) {
    $sql = "SELECT * FROM $tabla";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h1>Resultados PC: $tabla</h1>";
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";

        // Obtener los nombres de las columnas
        $columnas = $result->fetch_fields();
        foreach ($columnas as $columna) {
            echo "<th scope='col'>" . $columna->name . "</th>";
        }

        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        // Imprimir datos de cada fila
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($columnas as $columna) {
                echo "<td>" . $row[$columna->name] . "</td>";
            }
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<h1>No hay resultados para la tabla: $tabla</h1>";
    }
}

$conn->close();
?>
</body>
</html>
