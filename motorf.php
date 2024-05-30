<html>
    <?php
    $codFlujo=$_GET["codFlujo"];
    $codProceso=$_GET["codProceso"];
    include "conexion.php";
    $sql="select * from proceso where codFlujo='$codFlujo' and codProceso='$codProceso'";
    $result=mysqli_query($con,$sql);
    $fila=mysqli_fetch_array($result);
    $codProcesoSiguiente=$fila['codProcesoSiguiente'];
    $archivo=$fila['pantalla'];
    ?>
    <body>
        <h1>Motor de Flujo</h1>
        <br>

    <form action="controlador.php" method="GET">
        
    <?php
    include $archivo;
    ?>
    <input type="hidden" value="<?php echo $codFlujo; ?>" name="codFlujo"/>
    <input type="hidden" value="<?php echo $codProceso; ?>" name="codProceso"/>
    <input type="hidden" value="<?php echo $codProcesoSiguiente; ?>" name="codProcesoSiguiente"/>
    <input type="submit" value="Anterior" name="Anterior"/>
    <input type="submit" value="Siguiente" name="Siguiente"/>
    </form>

    </body>
</html>