<?php
include "conexion.php";
$result=mysqli_query($con,"select * from proceso where codProceso='P1'");
$fila=mysqli_fetch_array($result);
$proceso=$fila['codFlujo'];
echo $proceso;
?>