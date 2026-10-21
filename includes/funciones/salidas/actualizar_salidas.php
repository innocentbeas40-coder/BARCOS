<?php

require __DIR__ . '/../../../db/conexion.php';

function actualizar_salida()
{
    require __DIR__ . '/../../../db/conexion.php';

    $IdSalida = $_GET['IdSalida'];

    $query = "SELECT * FROM salidas WHERE IdSalida = '$IdSalida'";

    $resultado = mysqli_query($conex, $query);

    $salida = mysqli_fetch_assoc($resultado);

    return $salida;
}



$IdSalida = $_GET['IdSalida'];

$errores = [];

if (isset($_POST['actualizar'])) {

    $Fecha = mysqli_real_escape_string($conex, $_POST['Fecha']);
    $Hora = mysqli_real_escape_string($conex, $_POST['Hora']);
    $Destino = mysqli_real_escape_string($conex, $_POST['Destino']);
    $Barcos_Matricula = mysqli_real_escape_string($conex, $_POST['Barcos_Matricula']);

    if (!$Fecha) {
        $errores[] = "Ingrese la fecha";
    }

    if (!$Hora) {
        $errores[] = "Ingrese la hora";
    }

    if (!$Destino) {
        $errores[] = "Ingrese el destino";
    } elseif (!preg_match("/^[\p{L}0-9 ]+$/u", $Destino)) {
        $errores[] = "El destino solo debe contener letras, números y espacios";
    }

    if (!$Barcos_Matricula) {
        $errores[] = "Ingrese la matrícula del barco";
    }

    if (!$errores) {

        $query = "SELECT * FROM barco WHERE matricula = '$Barcos_Matricula'";

        $resultado = mysqli_query($conex, $query);

        if (!$resultado) {

            $errores[] = "Error al consultar la base de datos";

        } elseif (mysqli_num_rows($resultado) == 0) {

            $errores[] = "El barco no existe";
        }
    }

    if (!$errores) {

        $query = "UPDATE salidas SET
        Fecha = '$Fecha',
        Hora = '$Hora',
        Destino = '$Destino',
        Barcos_Matricula = '$Barcos_Matricula'
        WHERE IdSalida = '$IdSalida'";

        $resultado = mysqli_query($conex, $query);

        $message = $resultado ? 1 : 2;

        header("Location: ../../pag/salidas.php?actualizado=$message");
        exit;
    }
}
