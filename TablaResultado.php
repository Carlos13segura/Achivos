<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventario_pc";

//crear conexion
$conn = mysqli_connect($servername, $username, $password, $dbname);

//Verificar si hay errores al conectar
if (mysqli_connect_errno()) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

$sql="SELECT Procesador,Service_Tag,Marca,Cantidad_de_almacenamiento,Tipo_de_ram FROM PC";
$result = $conn->query($sql);

if($result->num_rows> 0) {
    //imprimir datos de cada fila
    while($row = $result->fetch_assoc()){
      
    echo"<head>";
    echo"<title>Formulario ITAIPUE Inventario PC</title>";
    echo"<link rel=\"shortcut icon\" href=\"logo.png\"/>";
    echo"<link rel=\"stylesheet\" href=\"styles.css\">";
    echo"</head>";
    echo"<table class='table'>";
    echo "<thead>";
    echo "<h1>Tabla Resultados PC Inventario ITAIPUE</h1>";
    echo "<tr>";
    echo "<th socope='col'>#</th>";
    echo "<th socope='col'>Procesador</th>";
    echo "<th socope='col'>Service Tag</th>";
    echo "<th socpe='col'>Cantidad de Almacenamiento</th>";
    echo "<th socope='col'>Tipo de RAM";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    if ($result->num_rows > 0) {
        /* imprimir datos de cada fila  */
        $index = 1;
        while($row = $result->fetch_assoc()) {
            echo"<tr>";
            echo "<th scope='row'>" . $index . "</th>"; /* bucle para generar el numero unico */
            echo "<td>" . $row["Procesador"]. "</td>";
            echo "<td>". $row["Service_Tag"]."</td>";
            echo "<td>". $row["Cantidad_de_almacenamiento"]."</td>";
            echo "<td>". $row["Tipo_de_ram"]."</td>";
            echo "</tr>";
            $index++;
        }
    } else {
      echo "0 resultados";
    }
    
    echo "</tbody>";
    echo "</table>";
    echo "</body>";
    }
} else {
    echo "0 resultados";
  }
  $conn->close();
?>
