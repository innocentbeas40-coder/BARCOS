<?php

function eliminar_salidas()
{
    require __DIR__ . '/../../../db/conexion.php';

    $IdSalida = $_GET['IdSalida'];

    $query = "DELETE FROM salidas WHERE IdSalida  = '$IdSalida'";
    
    $resultado = mysqli_query($conex, $query);

    return $resultado;
}

$resultado = eliminar_barcos();

$message = $resultado ? 6 : 7;

header ("location: /BARCOS/pag/barcos.php?mensaje=$message");
exit;