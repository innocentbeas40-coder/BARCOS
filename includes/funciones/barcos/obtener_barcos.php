<?php

function obtener_barcos()
{
    require __DIR__ . '/../../../db/conexion.php';

    $sql = "SELECT * FROM barco";

    $query = mysqli_query($conex, $sql);

    return $query;
}

