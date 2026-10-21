<?php

function agregar_socios()
{
    require __DIR__ . '/../../../db/conexion.php';

    $errores = [];

    $cedula = mysqli_real_escape_string($conex, $_POST['cedula']);
    $apellido = mysqli_real_escape_string($conex, $_POST['apellido']);
    $telefono = mysqli_real_escape_string($conex, $_POST['telefono']);

    // VALIDAR CÉDULA

    if (!$cedula) {
        $errores[] = "Ingrese la cédula";
    } elseif (!ctype_digit($cedula)) {
        $errores[] = "La cédula solo debe contener números";
    } elseif (strlen($cedula) < 6 || strlen($cedula) > 10) {
        $errores[] = "La cédula debe tener entre 6 y 10 números";
    }

    // VALIDAR APELLIDO

    if (!$apellido) {
        $errores[] = "Ingrese el apellido";
    } elseif (!preg_match("/^[\p{L} ]+$/u", $apellido)) {
        $errores[] = "El apellido solo debe contener letras y espacios";
    }

    // VALIDAR TELÉFONO

    if (!$telefono) {
        $errores[] = "Ingrese el teléfono";
    } elseif (!ctype_digit($telefono)) {
        $errores[] = "El teléfono solo debe contener números";
    } elseif (strlen($telefono) < 7 || strlen($telefono) > 10) {
        $errores[] = "El teléfono debe tener entre 7 y 10 números";
    }

    // VERIFICAR SI LA CÉDULA YA EXISTE

    if (!$errores) {

        $query = "SELECT * FROM socio WHERE cedula = '$cedula'";

        $resultado = mysqli_query($conex, $query);

        if (!$resultado) {
            $errores[] = "Error al consultar la base de datos";
        } elseif (mysqli_num_rows($resultado) > 0) {
            $errores[] = "La cédula ya está registrada";
        }
    }

    // AGREGAR SOCIO

    if (!$errores) {

        $query = "INSERT INTO socio (cedula, apellido, telefono)
                  VALUES ('$cedula', '$apellido', '$telefono')";

        $resultado = mysqli_query($conex, $query);

        if ($resultado) {
            echo "Socio agregado con éxito";
        }else {
            echo "Error al agregar socio" . mysqli_error($conex);
        }
    }

    return $errores;
}
