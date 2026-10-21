<?php

require __DIR__ . '/../../../db/conexion.php';



function actualizar_socios()
{
    require __DIR__ . '/../../../db/conexion.php';

    $cedula = $_GET['cedula'];

    $query = "SELECT * FROM socio WHERE cedula = '$cedula'";

    $resultado = mysqli_query($conex, $query);

    $socio = mysqli_fetch_assoc($resultado);

    return $socio;
}



$cedula = $_GET['cedula'];

$errores = [];


if (isset($_POST['actualizar'])) {
    

    $nuevaCedula = mysqli_real_escape_string($conex, $_POST['cedula']);
    $apellido = mysqli_real_escape_string($conex, $_POST['apellido']);
    $telefono = mysqli_real_escape_string($conex, $_POST['telefono']);


    // Validar cédula

    if (!$nuevaCedula) {
        $errores[] = "Ingrese la cédula";
    } elseif (!ctype_digit($nuevaCedula)) {
        $errores[] = "La cédula solo debe contener números";
    } elseif (strlen($nuevaCedula) < 7 || strlen($nuevaCedula) > 10) {
        $errores[] = "La cédula debe tener entre 7 y 10 dígitos";
    }


    // Validar apellido

    if (!$apellido) {
        $errores[] = "Ingrese apellido";
    } elseif (!preg_match("/^[\p{L} ]+$/u", $apellido)) {
        $errores[] = "El apellido solo debe contener letras";
    }



    // Validar teléfono

    if (!$telefono) {
        $errores[] = "Ingrese teléfono";
    } elseif (!ctype_digit($telefono)) {
        $errores[] = "El teléfono solo debe contener números";
    } elseif (strlen($telefono) != 10) {
        $errores[] = "El teléfono debe tener 10 dígitos";
    }


    // Verificar si la cédula ya existe

    if (!$errores) {

        $query = "SELECT * FROM socio
                  WHERE cedula = '$nuevaCedula'
                  AND cedula != '$cedula'";

        $resultado = mysqli_query($conex, $query);

        if (mysqli_num_rows($resultado) > 0) {
            $errores[] = "La cédula ya está registrada";
        }
    }


    // Actualizar socio si no hay errores

    if (!$errores) {

        $query = "UPDATE socio SET
        cedula = '$nuevaCedula',
        apellido = '$apellido',
        telefono = '$telefono'
        WHERE cedula = '$cedula'";

        $resultado = mysqli_query($conex, $query);

        $message = $resultado ? 1 : 2;

        header("Location: ../../pag/socios.php?actualizado=$message");
        exit;
    }
}

