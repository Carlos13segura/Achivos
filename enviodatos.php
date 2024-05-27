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

$pro = $_POST["pro"]; /* Procesador */
$moni = $_POST["moni"]; /* Definne la variable Monitores  */
$model = $_POST["model"]; /* Define la variable Modelo  */
$marca = $_POST["marca"]; /* Define la variable Marca  */
$num_serie = $_POST["num_serie"]; /* Define la variable Numero de Serie */
$service_Tag = $_POST["service_Tag"]; /* Define la variable Service Tag */
$tipo_Alm = $_POST["tipo_Alm"]; /* Define la variable tipo de Almacenamiento  */
$canAlm = $_POST["canAlm"]; /* Define la variable cantidad de almacenamiento */
$tipo_ram = $_POST["tipo_ram"]; /* Define la variable Tipo de RAM  */
$fuent_poder = $_POST["fuent_poder"]; /* Define la variable Fuente de Poder  */
$num_serie_teclado = $_POST["num_serie_teclado"]; /* Define la Variable numero de serie del teclado  */
$marc_teclado = $_POST["marc_teclado"]; /* Define la variable Marca del teclado  */
$num_serie_mouse = $_POST["num_serie_mouse"]; /* Define la variable Numero de serie del Mouse  */
$marc_mouse = $_POST["marc_mouse"]; /* Define la variable Marca del Mouse */

$sql="INSERT INTO pc (`Procesador`, `Monitores`, `Modelo`, `Marca`, `Numero_de_serie`, `Service_Tag`, `Tipo_de_almacenamiento`, `Cantidad_de_almacenamiento`, `Tipo_de_ram`, `Fuente_de_poder`, `Numero_de_serie_teclado`, `Marca_teclado`, `Numero_de_serie_mouse`, `Marca_mouse`)
VALUES ('$pro', '$moni',  '$model', '$marca', '$num_serie', '$service_Tag', '$tipo_Alm', '$canAlm', '$tipo_ram', '$fuent_poder', '$num_serie_teclado', '$marc_teclado', '$num_serie_mouse', '$marc_mouse')";

echo $sql;
if (mysqli_query($conn, $sql)) {
    echo "Nuevo registro creado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
