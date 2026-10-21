<?php

function obtener_socios()
{
    require __DIR__ . '/../../../db/conexion.php';

    $sql = "SELECT * FROM socio";

    $query = mysqli_query($conex, $sql);

    return $query;
}

