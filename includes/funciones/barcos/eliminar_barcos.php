<?php

function eliminar_barcos()
{
    require __DIR__ . '/../../../db/conexion.php';

    $matricula = $_GET['matricula'];

    $query = "DELETE FROM barco WHERE matricula = '$matricula'";
    
    $resultado = mysqli_query($conex, $query);

    return $resultado;
}

$resultado = eliminar_barcos();

$message = $resultado ? 4 : 5;

header ("location: /BARCOS/pag/barcos.php?mensaje=$message");
exit;