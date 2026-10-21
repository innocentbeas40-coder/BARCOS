<?php

function obtener_salidas()
{
    require __DIR__ . '/../../../db/conexion.php';

    $sql = "SELECT * FROM salidas";

    $query = mysqli_query($conex, $sql);

    return $query;
}

