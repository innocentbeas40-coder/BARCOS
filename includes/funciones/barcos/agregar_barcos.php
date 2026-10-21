<?php

function agregar_barcos()
{
    require __DIR__ . '/../../../db/conexion.php';

    $errores = [];

    $matricula = mysqli_real_escape_string($conex, $_POST['matricula']);
    $nombre = mysqli_real_escape_string($conex, $_POST['nombre']);
    $n_amarre = mysqli_real_escape_string($conex, $_POST['n_amarre']);
    $cuota_amarre = mysqli_real_escape_string($conex, $_POST['cuota_amarre']);
    $socio_cedula = mysqli_real_escape_string($conex, $_POST['socio_cedula']);


    // VALIDAR MATRÍCULA

    if (!$matricula) {
        $errores[] = "Ingrese la matrícula";
    } elseif (strlen($matricula) > 15) {
        $errores[] = "La matrícula no puede tener más de 15 caracteres";
    }


    // VALIDAR NOMBRE

    if (!$nombre) {
        $errores[] = "Ingrese el nombre del barco";
    } elseif (!preg_match("/^[\p{L}0-9 ]+$/u", $nombre)) {
        $errores[] = "El nombre solo debe contener letras, números y espacios";
    }


    // VALIDAR NÚMERO DE AMARRE

    if (!$n_amarre) {
        $errores[] = "Ingrese el número de amarre";
    }


    // VALIDAR CUOTA

    if (!$cuota_amarre) {
        $errores[] = "Ingrese la cuota de amarre";
    } elseif (!is_numeric($cuota_amarre)) {
        $errores[] = "La cuota de amarre debe ser un número";
    } elseif ($cuota_amarre < 0) {
        $errores[] = "La cuota de amarre no puede ser negativa";
    }


    // VALIDAR SOCIO

    if (!$socio_cedula) {
        $errores[] = "Ingrese la cédula del socio";
    } elseif (!ctype_digit($socio_cedula)) {
        $errores[] = "La cédula del socio solo debe contener números";
    }


    // VERIFICAR MATRÍCULA REPETIDA

    if (!$errores) {

        $query = "SELECT * FROM barco WHERE matricula = '$matricula'";

        $resultado = mysqli_query($conex, $query);

        if (!$resultado) {

            $errores[] = "Error al consultar la base de datos";

        } elseif (mysqli_num_rows($resultado) > 0) {

            $errores[] = "La matrícula ya está registrada";
        }
    }


    // VERIFICAR QUE EL SOCIO EXISTA

    if (!$errores) {

        $query = "SELECT * FROM socio WHERE cedula = '$socio_cedula'";

        $resultado = mysqli_query($conex, $query);

        if (!$resultado) {

            $errores[] = "Error al consultar la base de datos";

        } elseif (mysqli_num_rows($resultado) == 0) {

            $errores[] = "El socio no existe";
        }
    }


    // AGREGAR BARCO

    if (!$errores) {

        $query = "INSERT INTO barco
                  (matricula, nombre, n_amarre, cuota_amarre, socio_cedula)
                  VALUES
                  ('$matricula', '$nombre', '$n_amarre', '$cuota_amarre', '$socio_cedula')";

        $resultado = mysqli_query($conex, $query);

        if ($resultado) {

            echo "El barco se agrego correctamente";    

        }else{
            echo "Error al agregar barco" . mysqli_error($conex);
        }
    }

    return $errores;
}

