<?php
$codFlujo = $_GET["codFlujo"];
$codProceso = $_GET["codProceso"];
$codProcesoSiguiente = $_GET["codProcesoSiguiente"];

// Verifica si se presionó "Anterior" o "Siguiente"
if (isset($_GET["Anterior"])) {
    $sql = "SELECT * FROM proceso WHERE codFlujo = '$codFlujo' AND codProcesoSiguiente = '$codProceso'";
} elseif (isset($_GET["Siguiente"])) {
    $sql = "SELECT * FROM proceso WHERE codFlujo = '$codFlujo' AND codProceso = '$codProcesoSiguiente'";
}

include "conexion.php"; // Asegúrate de que esta línea esté correcta

$result = mysqli_query($con, $sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}

$fila = mysqli_fetch_array($result);
$codprocesoEnvia = $fila['codProceso'];
$archivoEnvia = "motorf.php?codFlujo=" . $codFlujo . "&codProceso=" . $codprocesoEnvia;
//echo $archivoEnvia; // Puedes redirigir al usuario con header("Location: " . $archivoEnvia);
header("Location: ".$archivoEnvia);
?>
