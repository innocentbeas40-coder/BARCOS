<?php

require __DIR__ . '/../../../db/conexion.php';

function actualizar_barco()
{
    require __DIR__ . '/../../../db/conexion.php';

    $matricula = $_GET['matricula'];

    $query = "SELECT * FROM barco WHERE matricula = '$matricula'";

    $resultado = mysqli_query($conex, $query);

    $barco = mysqli_fetch_assoc($resultado);

    return $barco;
}

$matricula = $_GET['matricula'];

$errores = [];


if (isset($_POST['actualizar'])) {

    $nuevaMatricula = mysqli_real_escape_string($conex, $_POST['matricula']);
    $nombre = mysqli_real_escape_string($conex, $_POST['nombre']);
    $n_amarre = mysqli_real_escape_string($conex, $_POST['n_amarre']);
    $cuota_amarre = mysqli_real_escape_string($conex, $_POST['cuota_amarre']);
    $socio_cedula = mysqli_real_escape_string($conex, $_POST['socio_cedula']);


    // Validar matrícula

    if (!$nuevaMatricula) {
        $errores[] = "Ingrese la matrícula";
    } elseif (strlen($nuevaMatricula) > 15) {
        $errores[] = "La matrícula no puede tener más de 15 caracteres";
    }


    // Validar nombre

    if (!$nombre) {
        $errores[] = "Ingrese el nombre del barco";
    } elseif (!preg_match("/^[\p{L}0-9 ]+$/u", $nombre)) {
        $errores[] = "El nombre solo debe contener letras, números y espacios";
    }


    // Validar número de amarre

    if (!$n_amarre) {
        $errores[] = "Ingrese el número de amarre";
    }


    // Validar cuota de amarre

    if (!$cuota_amarre) {
        $errores[] = "Ingrese la cuota de amarre";
    } elseif (!is_numeric($cuota_amarre)) {
        $errores[] = "La cuota de amarre debe ser un número";
    } elseif ($cuota_amarre < 0) {
        $errores[] = "La cuota de amarre no puede ser negativa";
    }


    // Validar socio

    if (!$socio_cedula) {
        $errores[] = "Ingrese la cédula del socio";
    } elseif (!ctype_digit($socio_cedula)) {
        $errores[] = "La cédula del socio solo debe contener números";
    }


    // Verificar si la matrícula ya existe

    if (!$errores) {

        $query = "SELECT * FROM barco
                  WHERE matricula = '$nuevaMatricula'
                  AND matricula != '$matricula'";

        $resultado = mysqli_query($conex, $query);

        if (!$resultado) {

            $errores[] = "Error al consultar la base de datos";

        } elseif (mysqli_num_rows($resultado) > 0) {

            $errores[] = "La matrícula ya está registrada";
        }
    }


    // Verificar que el socio exista

    if (!$errores) {

        $query = "SELECT * FROM socio WHERE cedula = '$socio_cedula'";

        $resultado = mysqli_query($conex, $query);

        if (!$resultado) {

            $errores[] = "Error al consultar la base de datos";

        } elseif (mysqli_num_rows($resultado) == 0) {

            $errores[] = "El socio no existe";
        }
    }


    // Actualizar barco si no hay errores

    if (!$errores) {

        $query = "UPDATE barco SET
        matricula = '$nuevaMatricula',
        nombre = '$nombre',
        n_amarre = '$n_amarre',
        cuota_amarre = '$cuota_amarre',
        socio_cedula = '$socio_cedula'
        WHERE matricula = '$matricula'";

        $resultado = mysqli_query($conex, $query);

        $message = $resultado ? 1 : 2;

        header("Location: ../../pag/barcos.php?actualizado=$message");
        exit;
    }
}

